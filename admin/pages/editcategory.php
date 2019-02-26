<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
    if(!isset($_GET['edit']) || $_GET['edit'] == NULL){
        echo "<script type='text/javascript'> window.location ='category.php'; </script>";
        //header("Location: posts.php");
    }else{
        $id = $_GET['edit'];
    }
?>


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category</h1>
            </div>
            <!-- /.col-lg-12 -->
            <!--            customize content starts here-->
            <div id="menu-panel">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Main Menu
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-subscribe">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Count</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT * FROM list_category ORDER BY id DESC";
                                $category = $database->select($query);
                                if($category){
                                    $i = 0;
                                    while($result = $category->fetch_assoc()){
                                        $i++
                                 ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td  class="center"><?php echo $result['name']; ?></td>
                                            <td>
                                            <?php
                                                $catid = $result['id'];
                                                $query = "SELECT * FROM list_posts WHERE category = '$catid' ";
                                                $catcount = $database->select($query);
                                                if($catcount){
                                                    $count = mysqli_num_rows($catcount);
                                                    echo $count;
                                                }else{
                                                    echo 0;
                                                }
                                            ?>
                                            </td>
                                            <td  class="center"> <a href="editcategory.php?edit=<?php echo $result['id']; ?>"><i class="fa fa-edit  fa-fw"></i></a>  <a onclick="return confirm('Are you sure?')" href="?delete=<?php echo $result['id']; ?>"><i class="fa fa-trash  fa-fw"></i></a>  </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Update Category
                        </div>
                        <div class="panel-body">
                            <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $name = $format->validation($_POST['name']);
                                $slug = $format->slug($name);
                                $name = mysqli_real_escape_string($database->link, $name);
                                if($name == ""){
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                }else{
                                    $query = "UPDATE list_category
                                                SET 
                                                name = '$name',
                                                slug = '$slug'
                                                WHERE
                                                id = '$id' ";
                                    $updated_row = $database->update($query);
                                    if($updated_row){
                                        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Category updated successfully ! <a href='category.php' class='btn btn-primary'>Back</a></div>";
                                    }else{
                                        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Category not updated !</div>";
                                    }
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <?php
                                    $query = "SELECT * FROM list_category WHERE id = '$id' ";
                                    $category = $database->select($query);
                                    if($category){
                                    while($result = $category->fetch_assoc()){
                                ?>
                                <div class="form-group col-md-8">
                                    <input type="text" name="name" class="form-control" id="inputPassword2" value="<?php echo $result['name']; ?>">
                                </div>
                                <?php
                                        }
                                    }
                                ?>
                                <input type="submit" class="btn btn-primary col-md-4" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!--            customize content starts here-->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>

<script>
    $(document).ready(function() {
        $('#dataTables-subscribe').DataTable({
            responsive: true
        });
        $('#dataTables-newsletter').DataTable({
            responsive: true
        });
    });
</script>
