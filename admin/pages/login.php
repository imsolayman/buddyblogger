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

    <title>Buddyblogger - Login</title>

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
                        <h3 class="panel-title">Please Sign In <span class="registration"><a href="registration.php">Create an Account</a></span></h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $email = $format->validation($_POST['email']);
                                $password = $format->validation(md5($_POST['password']));
                                $email = mysqli_real_escape_string($database->link, $email);
                                $password = mysqli_real_escape_string($database->link, $password);

                                if($_POST['email'] == "" || $_POST['password'] == "" ){
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                }else{
                                    $query = "SELECT * FROM list_user WHERE email = '$email' AND password = '$password' ";
                                    $result = $database->select($query);
                                    if($result != false){
                                        $value = $result->fetch_assoc();
                                        session::set("login", true);
                                        session::set("userName", $value['username']);
                                        session::set("userId", $value['id']);
                                        session::set("userRole", $value['role']);
                                        header("Location: index.php");
                                    }else{
                                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Incorrect email and password !!</div>";
                                    }
                                }
                            }
                        ?>
                        <form action="" role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" required  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label class="col-md-6  forgot-pass">
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                    <label  class="col-md-6  forgot-pass">
                                        <span><a href="forgotpass.php">Forgot Password?</a></span>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login">
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

</body>

</html>
