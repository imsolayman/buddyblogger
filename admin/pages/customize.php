<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
    if(Session::get('userRole') != '1'){
        echo "<script type='text/javascript'> window.location ='index.php'; </script>";
    }
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Apperance</h1>
            </div>
            <!-- /.col-lg-12 -->
    <!--            customize content starts here-->
                <?php
                    $query = "SELECT * FROM list_customize WHERE id = '1'  ";
                    $data = $database->select($query);
                    if($data){
                        while($result = $data->fetch_assoc()){
                ?>
                <div id="title-panel">
                    <div class="col-lg-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Website Title
                            </div>
                            <div class="panel-body title-panel">
                                <?php
                                    if(isset($_POST["headline"])){
                                        $title = $format->validation($_POST['title']);
                                        $tagline = $format->validation($_POST['tagline']);
                                        $title = mysqli_real_escape_string($database->link, $title);
                                        $tagline = mysqli_real_escape_string($database->link, $tagline);
                                        if($title == "" || $tagline == ""){
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                        }else{
                                            $query = "UPDATE list_customize
                                                SET 
                                                title = '$title',
                                                tagline = '$tagline'
                                                WHERE
                                                id = '1' ";
                                            $updated_row = $database->update($query);
                                            if($updated_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Title updated successfully !</div>";
                                            }else{
                                                echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Title not updated !</div>";
                                            }
                                        }
                                    }
                                ?>
                                <form class="form-inline title-form" action="" method="post">
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inputPassword2" class="sr-only">Title</label>
                                        <input type="text" name="title" class="form-control" id="inputPassword2" value="<?php echo $result['title']; ?>">
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="inputPassword2" class="sr-only">Tagline</label>
                                        <input type="text" name="tagline" class="form-control" id="inputPassword2" value="<?php echo $result['tagline']; ?>">
                                    </div>
                                    <input type="submit" class="btn btn-primary mb-2" name="headline" value="Update">
<!--                                    <button type="submit" class="btn btn-primary mb-2"></button>-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-8">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Logo
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <img src="../<?php echo $result['logo']; ?>" alt="" width="120px" height="80px">
                                </div>
                                <div class="col-md-4">
                                    <?php
                                        if(isset($_POST['logo'])){
                                            $permited  = array('jpg', 'jpeg', 'png', 'gif');
                                            $file_name = $_FILES['image']['name'];
                                            $file_size = $_FILES['image']['size'];
                                            $file_temp = $_FILES['image']['tmp_name'];

                                            $div = explode('.', $file_name);
                                            $file_ext = strtolower(end($div));
                                            $same_name = 'logo'.'.'.$file_ext;
                                            $uploaded_image = "../upload/".$same_name;

                                            if(empty($file_temp)){
                                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Please select a logo !</div>";
                                            }elseif($file_size >1048567) {
                                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>File size can't be so much !</div>";
                                            }elseif(in_array($file_ext, $permited) === false) {
                                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>You can upload only:-".implode(', ', $permited)."</div>";
                                            } else{
                                                move_uploaded_file($file_temp, $uploaded_image);
                                                $query = "UPDATE list_customize
                                                    SET 
                                                    logo = 'upload/$same_name'
                                                    WHERE
                                                    id = '1' ";
                                                $updated_row = $database->insert($query);
                                                if ($updated_row) {
                                                    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Logo updated successfully !</div>";
                                                }else {
                                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Logo not updated !</div>";
                                                }
                                            }
                                        }
                                    ?>
                                    <form action="" class="" method="post"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="file" name="image" />
                                        </div>
                                        <input type="submit" class="btn btn-primary mb-2" name="logo" value="Update">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
              </div>
    <!--            customize content starts here-->
                <div id="contact-panel">

                    <!-- /.col-lg-4 -->
                    <div class="col-lg-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Social Icons
                            </div>
                            <div class="panel-body">
                                <?php
                                if(isset($_POST["social"])){
                                    $facebook = $format->validation($_POST['facebook']);
                                    $twitter = $format->validation($_POST['twitter']);
                                    $instagram = $format->validation($_POST['instagram']);
                                    $skype = $format->validation($_POST['skype']);
                                    $linkedin = $format->validation($_POST['linkedin']);
                                    $youtube = $format->validation($_POST['youtube']);
                                    $facebook = mysqli_real_escape_string($database->link, $facebook);
                                    $twitter = mysqli_real_escape_string($database->link, $twitter);
                                    $instagram = mysqli_real_escape_string($database->link, $instagram);
                                    $skype = mysqli_real_escape_string($database->link, $skype);
                                    $linkedin = mysqli_real_escape_string($database->link, $linkedin);
                                    $youtube = mysqli_real_escape_string($database->link, $youtube);
                                    $query = "UPDATE list_social
                                            SET 
                                            facebook = '$facebook',
                                            twitter = '$twitter',
                                            instagram = '$instagram',
                                            skype = '$skype',
                                            linkedin = '$linkedin',
                                            youtube = '$youtube'
                                            WHERE
                                            id = '1' ";
                                    $updated_row = $database->update($query);
                                    if($updated_row){
                                        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Contact updated successfully !</div>";
                                    }else{
                                        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Contact not updated !</div>";
                                    }
                                }
                                ?>
                                <form action="" method="post">
                                    <?php
                                        $query = "SELECT * FROM list_social WHERE id = '1'  ";
                                        $data = $database->select($query);
                                        if($data){
                                        while($result = $data->fetch_assoc()){
                                    ?>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"><a href="" class="btn btn-primary btn-facebook"><i class="fa fa-facebook"></i></a></label>
                                        <div class="col-sm-10">
                                            <input type="facebook" name="facebook" class="form-control" id="inputEmail3" value="<?php echo $result['facebook']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"><a href="" class="btn btn-primary btn-success"><i class="fa fa-twitter"></i></a></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="twitter" class="form-control" id="inputEmail3" value="<?php echo $result['twitter']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"><a href="" class="btn btn-danger btn-instagram"><i class="fa fa-instagram"></i></a></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="instagram" class="form-control" id="inputEmail3" value="<?php echo $result['instagram']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"><a href="" class="btn btn-info btn-skype"><i class="fa fa-skype"></i></a></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="skype" class="form-control" id="inputEmail3" value="<?php echo $result['skype']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"><a href="" class="btn btn-primary btn-linkedin"><i class="fa fa-linkedin"></i></a></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="linkedin" class="form-control" id="inputEmail3" value="<?php echo $result['linkedin']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"><a href="" class="btn btn-default btn-youtube"><i class="fa fa-youtube"></i></a></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="youtube" class="form-control" id="inputEmail3" value="<?php echo $result['youtube']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="submit" class="btn btn-primary mb-2" name="social" value="Update">
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
              </div>
                <div class="col-lg-8">
                    <!--                        copyright-section-->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Copyright
                        </div>
                        <div class="panel-body">
                            <?php
                            if(isset($_POST["copytext"])){
                                $copyright = $_POST['copyright'];
                                if($copyright == ""){
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                }else{
                                    $query = "UPDATE list_customize
                                    SET 
                                    copyright = '$copyright'
                                    WHERE
                                    id = '1' ";
                                    $updated_row = $database->update($query);
                                    if($updated_row){
                                        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Copyright updated successfully !</div>";
                                    }else{
                                        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Copyright not updated !</div>";
                                    }
                                }
                            }
                            ?>
                            <form  action="" method="post">
                                <?php
                                    $query = "SELECT * FROM list_customize WHERE id = '1'  ";
                                    $data = $database->select($query);
                                    if($data){
                                    while($result = $data->fetch_assoc()){
                                ?>
                                <div class="form-group col-md-10">
                                    <!--                                        <label for="inputPassword2" class="sr-only">Tagline</label>-->
                                    <input type="text" name="copyright" class="form-control" id="inputPassword2" value="<?php echo $result['copyright']; ?>">
                                </div>
                                <input type="submit" class="btn btn-primary mb-2" name="copytext" value="Update">
                                <?php
                                        }
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                    }
                }
            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>
