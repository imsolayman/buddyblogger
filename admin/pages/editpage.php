<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(Session::get('userRole') != '1'){
    echo "<script type='text/javascript'> window.location ='index.php'; </script>";
}
?>
<?php
if(!isset($_GET['edit']) || $_GET['edit'] == NULL){
    echo "<script type='text/javascript'> window.location ='pages.php'; </script>";
    //header("Location: posts.php");
}else{
    $id = $_GET['edit'];
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Page</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <?php
                $query = "SELECT * FROM list_seo WHERE id = '1' ";
                $seo = $database->select($query);
                if($seo){
                while($data = $seo->fetch_assoc()){
                ?>
                <div class="panel-body">
                    <div class="row">
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            if($data['checkcontent'] == '1' || $data['checkcontent'] == '1,2' || $data['checkcontent'] == '1,3' || $data['checkcontent'] == '1,2,3') {
                                $title = mysqli_real_escape_string($database->link, $_POST['title']);
                                $description = mysqli_real_escape_string($database->link, $_POST['description']);
                                $metatitle = mysqli_real_escape_string($database->link, $_POST['metatitle']);
                                $metadescription = mysqli_real_escape_string($database->link, $_POST['metadescription']);
                                $metakeywords = mysqli_real_escape_string($database->link, $_POST['metakeywords']);
                                $slug = $format->slug($title);
                                if($title == "" || $description == ""){
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                }else{
                                        $query = "UPDATE `list_pages` 
                                                      SET 
                                                      `title`='$title',
                                                      `description`='$description',
                                                      `metatitle`='$metatitle',
                                                      `metadescription`='$metadescription',
                                                      `metakeywords`='$metakeywords',
                                                      `slug`='$slug' 
                                                      WHERE `id` = $id ";
                                        $updated_row = $database->update($query);
                                        if($updated_row){
                                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Page updated successfully !  <a href='pages.php' class='btn btn-primary'>Back</a></div>";
                                        }else{
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Page not updated !</div>";
                                        }
                                    }

                            }else{
                                $title = mysqli_real_escape_string($database->link, $_POST['title']);
                                $description = mysqli_real_escape_string($database->link, $_POST['description']);
                                $slug = $format->slug($title);
                            if($title == "" || $description == ""){
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                            }else{
                                        $query = "UPDATE `list_pages` 
                                                  SET 
                                                  `title`='$title',
                                                  `description`='$description',
                                                  `slug`='$slug' 
                                                  WHERE `id` = $id ";
                                        $updated_row = $database->update($query);
                                        if($updated_row){
                                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Page updated successfully !  <a href='pages.php' class='btn btn-primary'>Back</a></div>";
                                        }else{
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Page not updated !</div>";
                                        }
                                    }
                                }

                        }
                        ?>
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <?php
                            $query = "SELECT * FROM list_pages WHERE id = '$id' ";
                            $posts = $database->select($query);
                            if($posts){
                                while($result = $posts->fetch_assoc()){
                                    ?>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <input class="form-control" name="title" value="<?php echo $result['title']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Page Content</label>
                                            <textarea class="form-control" name="description" rows="15" id="summernote"  name="editordata"><?php echo $result['description']; ?></textarea>
                                        </div>
                                        <div class="panel-body seo-meta-panel">
                                            <?php if($data['checkcontent'] == '1' || $data['checkcontent'] == '1,2' || $data['checkcontent'] == '1,3' || $data['checkcontent'] == '1,2,3') {?>
                                                <div class="panel-group" id="accordion">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">SEO Meta Data</a>
                                                            </h4>
                                                        </div>
                                                        <div id = "collapseThree" class="panel-collapse collapse" >
                                                            <div class="panel-body" >
                                                                <div class="form-group has-success" >
                                                                    <label class="control-label" for="inputSuccess" > Meta Title </label >
                                                                    <input type = "text"  name = "metatitle" class="form-control" id = "inputSuccess" value="<?php echo $result['metatitle']; ?>">
                                                                </div >
                                                                <div class="form-group has-success" >
                                                                    <label class="control-label" for="inputSuccess" > Meta Description </label >
                                                                    <input type = "text"  name = "metadescription" class="form-control" id = "inputSuccess" value="<?php echo $result['metadescription']; ?>">
                                                                </div >
                                                                <?php if($data['checkkeyword'] == '1') {?>
                                                                    <div class="form-group has-success" >
                                                                        <label class="control-label" for="inputSuccess" > Meta Keywords </label >
                                                                        <input type = "text"  name = "metakeywords" class="form-control" id = "inputSuccess" value="<?php echo $result['metakeywords']; ?>" >
                                                                    </div >
                                                                <?php   }   ?>
                                                            </div >
                                                        </div >
                                                    </div>
                                                </div>
                                            <?php   }   ?>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-2">
                                        <input type="submit" name="publish" class="btn btn-success col-md-12 publish" value="Update">
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </form>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                    <?php
                    }
                    }
                    ?>
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
</script>