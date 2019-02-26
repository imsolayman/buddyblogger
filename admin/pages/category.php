<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM list_category WHERE id = '$id' ";
    $deleted_row = $database->update($query);
    if($deleted_row){
        echo "<script>alert('Category deleted successfully');</script>";
    }else{
        echo "<script>alert('Something went wrong !');</script>";
    }
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
                            Category List
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-subscribe">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Posts</th>
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
                                        <td  class="center"> <a href="editcategory.php?edit=<?php echo $result['id']; ?>"> <i class="fa fa-edit  fa-fw"></i></a>  <a onclick="return confirm('Are you sure?')" href="?delete=<?php echo $result['id']; ?>"><i class="fa fa-trash  fa-fw"></i></a>  </td>
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
                            Add New Category
                        </div>
                        <div class="panel-body">
                                <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    $name = $format->validation($_POST['name']);
                                    $name = mysqli_real_escape_string($database->link, $name);
                                    $slug = $format->slug($name);
                                    if($name == ""){
                                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                    }else{
                                        $query = "INSERT INTO list_category (name, slug) VALUES ('$name', '$slug') ";
                                        $inserted_row = $database->insert($query);
                                        if($inserted_row){
                                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Category inserted successfully !</div>";
                                        }else{
                                            echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Category not inserted !</div>";
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="post">
                                    <div class="form-group col-md-8">
                                        <input type="text" name="name" class="form-control" id="inputPassword2" placeholder="Enter category name">
                                    </div>
                                    <input type="submit" class="btn btn-primary col-md-4" value="Add Category">
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
