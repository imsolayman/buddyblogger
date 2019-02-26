<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
    if(Session::get('userRole') != '1'){
        echo "<script type='text/javascript'> window.location ='index.php'; </script>";
    }
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Add User
                </div>
                <div class="panel-body">
                    <div class="row">
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $username = $format->validation($_POST['username']);
                            $email = $format->validation($_POST['email']);
                            $password = $format->validation(md5($_POST['password']));
                            $birth = $format->datePicker($_POST['birth']);

                            $username = mysqli_real_escape_string($database->link, $username);
                            $email = mysqli_real_escape_string($database->link, $email);
                            $password = mysqli_real_escape_string($database->link, $password);
                            $firstname = mysqli_real_escape_string($database->link, $_POST['firstname']);
                            $lastname = mysqli_real_escape_string($database->link, $_POST['lastname']);
                            $details = mysqli_real_escape_string($database->link, $_POST['details']);
                            $website = mysqli_real_escape_string($database->link, $_POST['website']);
                            $birth = mysqli_real_escape_string($database->link, $birth);
                            $role = mysqli_real_escape_string($database->link, $_POST['role']);

                            $permited  = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['image']['name'];
                            $file_size = $_FILES['image']['size'];
                            $file_temp = $_FILES['image']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "../upload/user/".$unique_image;
                            if($username == "" || $email == "" || $password == ""){
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                            }elseif($file_size>1048567){
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Image Size should be less then 1MB !</div>";
                            }elseif(in_array($file_ext, $permited) === false) {
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>You can upload only:-".implode(', ', $permited)."</div>";
                            }else{
                                move_uploaded_file($file_temp, $uploaded_image);
                                $query = "INSERT INTO list_user (firstname, lastname, username, photo, email, details, password, birth, website, role) VALUES ('$firstname', '$lastname', '$username', 'upload/user/$unique_image', '$email',  '$details', '$password', '$birth', '$website', '$role')";
                                $inserted_row = $database->insert($query);
                                if($inserted_row){
                                    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>User added successfully !</div>";
                                }else{
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>User not added !</div>";
                                }
                            }
                        }
                        ?>
                        <form  role="form" class="add-user col-md-8" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username*</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email*</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="firstname" class="form-control" id="inputEmail3" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lastname" class="form-control" id="inputEmail3" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">About You</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="details" placeholder="Enter Details About you"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password*</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Website</label>
                                <div class="col-sm-10">
                                    <input type="text" name="website" class="form-control" id="inputEmail3" placeholder="Enter web address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label" for="when">Date of Birth</label>
                                <div class="col-sm-3">
                                    <input class="form-control" name="birth" id="datepicker"  type="date" placeholder="1995-08-16">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Avatar</label>
                                <div class="col-sm-3">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="role" id="select">
                                        <option value="1">Admin</option>
                                        <option value="2">Editor</option>
                                        <option value="3">Author</option>
                                        <option value="4" selected>Subscriber</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="submit" name="publish" class="btn btn-primary col-md-4 publish" value="Add New User">
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
<script>
    $('#summernote').summernote({
        placeholder: 'Write post here',
        tabsize: 2,
        height: 200
    });
        $( "#datepicker" ).datepicker();
</script>