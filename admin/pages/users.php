<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(Session::get('userRole') != '1'){
    echo "<script type='text/javascript'> window.location ='index.php'; </script>";
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM list_user WHERE id = '$id' ";
    $deleted_row = $database->delete($query);
    if($deleted_row){
        echo "<script>alert('User deleted successfully');</script>";
    }else{
        echo "<script>alert('Something went wrong !');</script>";
    }
}
if(isset($_GET['confirm'])){
    $id = $_GET['confirm'];
    $query = "UPDATE list_user SET status = '1' WHERE id = '$id' ";
    $updated_row = $database->update($query);
    if($updated_row){
        echo "<script>alert('Thanks for your confirmation');</script>";
    }else{
        echo "<script>alert('Something went wrong');</script>";
    }
}elseif(isset($_GET['unconfirm'])){
    $id = $_GET['unconfirm'];
    $query = "UPDATE list_user SET status = '0' WHERE id = '$id' ";
    $updated_row = $database->update($query);
    if($updated_row){
        echo "<script>alert('Thanks for your confirmation');</script>";
    }else{
        echo "<script>alert('Something went wrong');</script>";
    }
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Management</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    All Users
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-subscribe">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Posts</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM list_user ORDER BY id DESC";
                            $users = $database->select($query);
                            if($users){
                                $i = 0;
                                while($result = $users->fetch_assoc()){
                                    $i++
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td  class="center"><?php echo $result['username']; ?></td>
                                        <td  class="text-capitalize"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                        <td  class="center"><?php echo $result['email']; ?></td>
                                        <td>
                                            <?php
                                                if($result['role'] == 1){
                                                        echo "Admin";
                                                    }elseif($result['role'] == 2){
                                                        echo "Editor";
                                                    }elseif($result['role'] == 3){
                                                        echo "Author";
                                                    }elseif($result['role'] == 4){
                                                        echo "Subscriber";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $userid = $result['id'];
                                                $query = "SELECT * FROM list_posts WHERE author = '$userid' ";
                                                $postcount = $database->select($query);
                                                if($postcount){
                                                    $count = mysqli_num_rows($postcount);
                                                    echo $count;
                                                }else{
                                                    echo 0;
                                                }
                                            ?>
                                        </td>
                                        <td  class="center"><a href="editprofile.php?edit=<?php echo $result['id']; ?>"><i class="fa fa-edit  fa-fw"></i></a>  <a onclick="return confirm('Are you sure?')" href="?delete=<?php echo $result['id']; ?>"><i class="fa fa-trash  fa-fw"></i></a>  </td>
                                        <td>
                                            <a onclick="return confirm('Are you sure to approve?')" href="?confirm=<?php echo $result['id']; ?>" class="doneMessage">
                                                <?php
                                                if($result['status'] == 0){
                                                    echo "<p class='error'>Pending</p>";
                                                }
                                                ?>
                                            </a>
                                            <a onclick="return confirm('Are you sure to unapprove?')" href="?unconfirm=<?php echo $result['id']; ?>" class="doneMessage">
                                                <?php
                                                if($result['status'] == 1){
                                                    echo "<p class='done'>Approved</p>";
                                                }
                                                ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
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
