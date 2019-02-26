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
            <h1 class="page-header">Profile</h1>
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
                    <div class="row">
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $username = $format->validation($_POST['username']);
                            $email = $format->validation($_POST['email']);
                            $birth = $format->datePicker($_POST['birth']);

                            $username = mysqli_real_escape_string($database->link, $username);
                            $email = mysqli_real_escape_string($database->link, $email);
                            $firstname = mysqli_real_escape_string($database->link, $_POST['firstname']);
                            $lastname = mysqli_real_escape_string($database->link, $_POST['lastname']);
                            $details = mysqli_real_escape_string($database->link, $_POST['details']);
                            $website = mysqli_real_escape_string($database->link, $_POST['website']);
                            $birth = mysqli_real_escape_string($database->link, $birth);

                            $permited  = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['image']['name'];
                            $file_size = $_FILES['image']['size'];
                            $file_temp = $_FILES['image']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "../upload/user/".$unique_image;
                            if($username == "" || $email == ""){
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                            }else{
                                if(!empty($file_name)){
                                    if($file_size>1048567){
                                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Image Size should be less then 1MB !</div>";
                                    }elseif(in_array($file_ext, $permited) === false) {
                                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>You can upload only:-".implode(', ', $permited)."</div>";
                                    }else{
                                        move_uploaded_file($file_temp, $uploaded_image);
                                        $query = "UPDATE `list_user` 
                                                  SET 
                                                  `firstname`='$firstname',
                                                  `lastname`='$lastname',
                                                  `username`='$username',
                                                  `email`='$email',
                                                  `photo`='upload/user/$unique_image',
                                                  `details`='$details',
                                                  `birth`='$birth',
                                                  `website`='$website'
                                                  WHERE `id` = '$userid' ";
                                        $updated_row = $database->insert($query);
                                        if($updated_row){
                                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>User updated successfully !   <a href='profile.php' class='btn btn-primary'>Back</a></div></div>";
                                        }else{
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>User not updated !</div>";
                                        }
                                    }
                                }else{
                                    $query = "UPDATE `list_user` 
                                                  SET 
                                                  `firstname`='$firstname',
                                                  `lastname`='$lastname',
                                                  `username`='$username',
                                                  `email`='$email',
                                                  `details`='$details',
                                                  `birth`='$birth',
                                                  `website`='$website'
                                                  WHERE `id` = '$userid' ";
                                    $updated_row = $database->update($query);
                                    if($updated_row){
                                        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>User updated successfully !  <a href='profile.php' class='btn btn-primary'>Back</a></div>";
                                    }else{
                                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>User not updated !</div>";
                                    }
                                }
                            }
                        }
                        ?>
                        <form  role="form" class="add-user col-md-8" action="" method="post" enctype="multipart/form-data">
                            <?php
                                $query = "SELECT * FROM list_user WHERE id = '$userid' AND  role = '$userrole' ";
                                $profile = $database->select($query);
                                if($profile){
                                while($result = $profile->fetch_assoc()){
                            ?>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username*</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control" id="inputEmail3" value="<?php echo $result['username']; ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email*</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" value="<?php echo $result['email']; ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="firstname" class="form-control" id="inputEmail3" value="<?php echo $result['firstname']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lastname" class="form-control" id="inputEmail3" value="<?php echo $result['lastname']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">About You</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="details"><?php echo $result['details']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Website</label>
                                <div class="col-sm-10">
                                    <input type="text" name="website" class="form-control" id="inputEmail3" value="<?php echo $result['website']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label" for="when">Date of Birth</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="birth" id="datepicker"  type="date" value="<?php echo $format->reverseDatePicker($result['birth']); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Avatar</label>
                                <div class="col-sm-3">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="submit" name="publish" class="btn btn-success col-md-4 publish" value="Update">  <a class="btn btn-primary" href="index.php">Back</a>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            ?>
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
<script>
    $('#summernote').summernote({
        placeholder: 'Write post here',
        tabsize: 2,
        height: 200
    });
    $( "#datepicker" ).datepicker();
</script>