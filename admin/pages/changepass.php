<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
$username = Session::get('userName');
$userid = Session::get('userId');
$userrole = Session::get('userRole');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Change Password</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Update Profile
                </div>
                <div class="panel-body">
                    <?php
                    $query = "SELECT * FROM list_user WHERE id = '$userid' AND  role = '$userrole' ";
                    $profile = $database->select($query);
                    $result = $profile->fetch_assoc();
                    $password_from_db = $result['password'];
                    ?>
                    <div class="row">
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $old = $format->validation($_POST['old']);
                            $newpass = $format->validation($_POST['new']);
                            $new = $format->validation(md5($_POST['new']));
                            $new = mysqli_real_escape_string($database->link, $new);
                            if(empty($newpass) || empty($old)){
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Filed Must Not be Empty !</div>";
                            }elseif((md5($old)) != $password_from_db){
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Old Password is Wrong !</div>";
                            }else{
                                $query = "UPDATE `list_user` 
                                          SET 
                                          `password`='$new'
                                          WHERE `id` = '$userid' ";
                                $updated_row = $database->update($query);
                                if ($updated_row) {
                                    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Password updated successfully !  <a href='index.php' class='btn btn-primary'>Back</a></div>";
                                } else {
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Password not updated !</div>";
                                }
                            }
                        }
                        ?>
                        <form  role="form" class="add-user col-md-8" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Old Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="old" class="form-control" id="inputEmail3" placeholder="Enter old password... " required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="new" class="form-control" id="inputEmail3" placeholder="Enter new password... " required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="submit" name="update" class="btn btn-success col-md-4 publish" value="Change">  <a class="btn btn-primary" href="index.php">Back</a>
                                        </div>
                                    </div>
                        </form>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>