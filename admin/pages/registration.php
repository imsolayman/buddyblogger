<?php include '../../config/config.php'; ?>
<?php include '../../lib/Session.php'; ?>
<?php include '../../lib/Database.php'; ?>
<?php include '../../lib/Format.php'; ?>
<?php
Session::checkLogin();
$database = new Database();
$format = new Format();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Buddyblogger - Registration</title>

    <!--    favicon-->
    <link rel="icon" href="../upload/favicon.ico" sizes="16x16" type="image/ico">

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/custom.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign Up <span class="registration"><a href="login.php">Login</a></span></h3>
                </div>
                <div class="panel-body">
                    <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $username = $format->validation($_POST['username']);
                        $email = $format->validation($_POST['email']);
                        $password = $format->validation(md5($_POST['confpass']));

                        $username = mysqli_real_escape_string($database->link, $username);
                        $email = mysqli_real_escape_string($database->link, $email);
                        $password = mysqli_real_escape_string($database->link, $password);
                        $firstname = mysqli_real_escape_string($database->link, $_POST['firstname']);
                        $lastname = mysqli_real_escape_string($database->link, $_POST['lastname']);
                        $website = mysqli_real_escape_string($database->link, $_POST['website']);

                        if($username == "" || $email == "" ||  $firstname == "" ||  $lastname == "" || $password == ""){
                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                        }else{
                            $query = "INSERT INTO list_user (firstname, lastname, username, email, password, website) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$website')";
                            $inserted_row = $database->insert($query);
                            if($inserted_row){
                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Account Created Successfully ! You can Login After Approval <a href='login.php'>Login Here</a> </div>";
                            }else{
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Something Went Wrong !</div>";
                            }
                        }
                    }
                    ?>
                    <form action="" role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="First Name" name="firstname" type="text" reguired>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Last Name" name="lastname" type="text" reguired>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="http://" name="website" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" id="pass" type="password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="confpass" id="confpass" type="password" required>
                            </div>
                            <div class="form-group">
                                <span class="error" style="color:red"></span><br />
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Create Account</button>
                        </fieldset>
                    </form>
                    <br>
                    <a href="<?php echo SITE_URL; ?>" class="btn btn-default col-md-12">Go To Website</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<script>
    var allowsubmit = false;
    $(function(){
        //on keypress
        $('#confpass').keyup(function(e){
            //get values
            var pass = $('#pass').val();
            var confpass = $(this).val();

            //check the strings
            if(pass == confpass){
                //if both are same remove the error and allow to submit
                $('.error').text('Matched');
                allowsubmit = true;
            }else{
                //if not matching show error and not allow to submit
                $('.error').text('Password not matching');
                allowsubmit = false;
            }
        });

        //jquery form submit
        $('#form').submit(function(){

            var pass = $('#pass').val();
            var confpass = $('#confpass').val();

            //just to make sure once again during submit
            //if both are true then only allow submit
            if(pass == confpass){
                allowsubmit = true;
            }
            if(allowsubmit){
                return true;
            }else{
                return false;
            }
        });
    });
</script>

</body>

</html>
