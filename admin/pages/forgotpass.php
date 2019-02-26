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

    <title>Ezeblog Admin - Bootstrap Admin Theme</title>

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
                    <h3 class="panel-title">Password Recovery</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $email = $format->validation($_POST['email']);
                        $email = mysqli_real_escape_string($database->link, $email);
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            echo "Invalid Email address";
                        }else{
                            $mailquery = "SELECT * FROM list_user WHERE  email = '$email' limit 1";
                            $mailcheck = $database->select($mailquery);
                            if($mailcheck != false){
                                while($value = $mailcheck->fetch_assoc()){
                                    $userid = $value['id'];
                                    $username = $value['username'];
                                }
                                $text = substr($email, 0, 3);
                                $rand = rand(10000, 9999);
                                $newpass = "$text$rand";
                                $password = md5($newpass);
                                $updatequery = "UPDATE list_user 
                            SET 
                            password = '$password'
                            WHERE 
                            id = '$userid' ";
                                $updated_row = $database->update($updatequery);
                                $to = "$email";
                                $from = "solaymang3@gmail.com";
                                $headers = "From: $from\n";
                                $headers .= "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                $subject = "Your password";
                                $message = "Your username is ".$username." and Password is ".$newpass." Please visit website to login";

                                $sendmail = mail($to,$subject,$message,$headers);
                                if($sendmail){
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Mail Sent Successfully !!</div>";
                                }else{
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Something Went Wrong !!</div>";
                                }
                            }else{
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Mail Not Exist !!</div>";
                            }
                        }
                    }
                    ?>
                    <form action="" role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="text" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>
                                    <span><a href="login.php">Back to Login</a></span>
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Send Mail">
                        </fieldset>
                    </form>
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
