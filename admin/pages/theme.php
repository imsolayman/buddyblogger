<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Theme Options</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">General Settings</a>
                </li>
                <!--                profile starts here will be activated when necessary-->
<!--                <li><a href="#profile" data-toggle="tab">Change Options</a></li>-->
            </ul>

            <!-- Tab panes -->

            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $logo = $_POST['logo'];
                    $themecolor = $_POST['themecolor'];
                    $themefont = $_POST['themefont'];
                    $query = "UPDATE list_theme 
                              SET logo = '$logo',
                                  themecolor = '$themecolor',
                                  themefont = '$themefont'
                              WHERE id = '1' ";
                    $updated_row = $database->update($query);
                    if($updated_row){
                        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Theme updated successfully !</div>";
                    }else{
                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Theme not updated !</div>";
                    }
                }
             ?>
            <div class="tab-content">

                <form role="form" action="" method="post">
                    <?php
                        $query = "SELECT * FROM list_theme WHERE id = '1'";
                        $themes = $database->select($query);
                        while($result = $themes->fetch_assoc()){
                    ?>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Logo
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Logo Type:</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="logo" value="1" <?php if($result['logo'] == '1'){ echo "checked"; } ?>>Logo Only
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="logo"  value="2" <?php if($result['logo'] == '2'){ echo "checked"; } ?>>Text Only <!--checked-->
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Theme Color
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Theme Color: </label>
                                <label class="radio-inline">
                                    <input type="radio" name="themecolor" id="optionsRadiosInline2" value="0" <?php if($result['themecolor'] == '0'){ echo "checked"; } ?>>Default
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="themecolor" id="optionsRadiosInline1" value="1" <?php if($result['themecolor'] == '1'){ echo "checked"; } ?>>Blue
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="themecolor" id="optionsRadiosInline2" value="2" <?php if($result['themecolor'] == '2'){ echo "checked"; } ?>>Violet
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="themecolor" id="optionsRadiosInline2" value="3" <?php if($result['themecolor'] == '3'){ echo "checked"; } ?>>Green
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="themecolor" id="optionsRadiosInline2" value="4" <?php if($result['themecolor'] == '4'){ echo "checked"; } ?>>Pink
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="themecolor" id="optionsRadiosInline2" value="5" <?php if($result['themecolor'] == '5'){ echo "checked"; } ?>>Yellow
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="themecolor" id="optionsRadiosInline2" value="6" <?php if($result['themecolor'] == '6'){ echo "checked"; } ?>>Sea
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Typography
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-md-4 typography">
                                <label for="inputState">Theme Font: </label>
                                <select class="form-control" name="themefont">
                                    <option value="0" <?php if($result['themefont'] == '0'){ echo "selected"; } ?>>Default </option>
                                    <option value="1" <?php if($result['themefont'] == '1'){ echo "selected"; } ?>>Open Sans </option>
                                    <option value="2" <?php if($result['themefont'] == '2'){ echo "selected"; } ?>>Raleway </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <input type="submit" class="btn btn-success" value="Update Options">
                            <input type="reset" class="btn btn-default" value="Restore Default">
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </form>


             </div>


<!--                profile starts here will be activated when necessary-->
<!--                <div class="tab-pane fade" id="profile"></div>-->

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>
