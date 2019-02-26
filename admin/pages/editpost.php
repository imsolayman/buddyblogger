<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
    if(!isset($_GET['edit']) || $_GET['edit'] == NULL){
        echo "<script type='text/javascript'> window.location ='posts.php'; </script>";
        //header("Location: posts.php");
    }else{
        $id = $_GET['edit'];
    }
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Post</h1>
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
                            if($data['checkcontent'] == '2' || $data['checkcontent'] == '1,2' || $data['checkcontent'] == '2,3' || $data['checkcontent'] == '1,2,3') {
                                $title = mysqli_real_escape_string($database->link, $_POST['title']);
                                $description = mysqli_real_escape_string($database->link, $_POST['description']);
                                $category = mysqli_real_escape_string($database->link, $_POST['category']);
                                $tags = mysqli_real_escape_string($database->link, $_POST['tags']);
                                $metatitle = mysqli_real_escape_string($database->link, $_POST['metatitle']);
                                $metadescription = mysqli_real_escape_string($database->link, $_POST['metadescription']);
                                $metakeywords = mysqli_real_escape_string($database->link, $_POST['metakeywords']);
                                $slug = $format->slug($title);

                                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                                $file_name = $_FILES['image']['name'];
                                $file_size = $_FILES['image']['size'];
                                $file_temp = $_FILES['image']['tmp_name'];

                                $div = explode('.', $file_name);
                                $file_ext = strtolower(end($div));
                                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                                $uploaded_image = "../upload/post/".$unique_image;
                                if($title == "" || $description == "" || $category == ""){
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                }else{
                                    if(!empty($file_name)){
                                        if($file_size>1048567){
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Image Size should be less then 1MB !</div>";
                                        }elseif(in_array($file_ext, $permited) === false) {
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>You can upload only:-".implode(', ', $permited)."</div>";
                                        }else{
                                            move_uploaded_file($file_temp, $uploaded_image);
                                            $query = "UPDATE `list_posts` 
                                                      SET 
                                                      `title`='$title',
                                                      `description`='$description',
                                                      `category`='$category',
                                                      `image`='upload/post/$unique_image',
                                                      `tags`='$tags',
                                                      `metatitle`='$metatitle',
                                                      `metadescription`='$metadescription',
                                                      `metakeywords`='$metakeywords',
                                                      `slug`='$slug' 
                                                      WHERE `id` = $id ";
                                            $updated_row = $database->update($query);
                                            if($updated_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Post updated successfully !  <a href='posts.php' class='btn btn-primary'>Back</a></div>";
                                            }else{
                                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Post not updated !</div>";
                                            }
                                        }
                                    }else{
                                        $query = "UPDATE `list_posts` 
                                                      SET 
                                                      `title`='$title',
                                                      `description`='$description',
                                                      `category`='$category',
                                                      `tags`='$tags',
                                                      `metatitle`='$metatitle',
                                                      `metadescription`='$metadescription',
                                                      `metakeywords`='$metakeywords',
                                                      `slug`='$slug' 
                                                      WHERE `id` = $id ";
                                        $updated_row = $database->update($query);
                                        if($updated_row){
                                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Post updated successfully !  <a href='posts.php' class='btn btn-primary'>Back</a></div>";
                                        }else{
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Post not updated !</div>";
                                        }
                                    }
                                }
                            }else{
                                $title = mysqli_real_escape_string($database->link, $_POST['title']);
                                $description = mysqli_real_escape_string($database->link, $_POST['description']);
                                $category = mysqli_real_escape_string($database->link, $_POST['category']);
                                $tags = mysqli_real_escape_string($database->link, $_POST['tags']);
                                $slug = $format->slug($title);

                                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                                $file_name = $_FILES['image']['name'];
                                $file_size = $_FILES['image']['size'];
                                $file_temp = $_FILES['image']['tmp_name'];

                                $div = explode('.', $file_name);
                                $file_ext = strtolower(end($div));
                                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                                $uploaded_image = "../upload/post/".$unique_image;
                                if($title == "" || $description == "" || $category == ""){
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                }else{
                                    if(!empty($file_name)){
                                        if($file_size>1048567){
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Image Size should be less then 1MB !</div>";
                                        }elseif(in_array($file_ext, $permited) === false) {
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>You can upload only:-".implode(', ', $permited)."</div>";
                                        }else{
                                            move_uploaded_file($file_temp, $uploaded_image);
                                            $query = "UPDATE `list_posts` 
                                                  SET 
                                                  `title`='$title',
                                                  `description`='$description',
                                                  `category`='$category',
                                                  `image`='upload/post/$unique_image',
                                                  `tags`='$tags',
                                                  `slug`='$slug' 
                                                  WHERE `id` = $id ";
                                            $updated_row = $database->update($query);
                                            if($updated_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Post updated successfully !  <a href='posts.php' class='btn btn-primary'>Back</a></div>";
                                            }else{
                                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Post not updated !</div>";
                                            }
                                        }
                                    }else{
                                        $query = "UPDATE `list_posts` 
                                                  SET 
                                                  `title`='$title',
                                                  `description`='$description',
                                                  `category`='$category',
                                                  `tags`='$tags',
                                                  `slug`='$slug' 
                                                  WHERE `id` = $id ";
                                        $updated_row = $database->update($query);
                                        if($updated_row){
                                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Post updated successfully !  <a href='posts.php' class='btn btn-primary'>Back</a></div>";
                                        }else{
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Post not updated !</div>";
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <?php
                                $query = "SELECT * FROM list_posts WHERE id = '$id' ";
                                $posts = $database->select($query);
                                if($posts){
                                    while($result = $posts->fetch_assoc()){
                            ?>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <input class="form-control" name="title" value="<?php echo $result['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Write Post</label>
                                    <textarea class="form-control" name="description" rows="10" id="summernote"  name="editordata"><?php echo $result['description']; ?></textarea>
                                </div>
                                            <div class="panel-body seo-meta-panel">
                                                    <?php if($data['checkcontent'] == '2' || $data['checkcontent'] == '1,2' || $data['checkcontent'] == '2,3' || $data['checkcontent'] == '1,2,3') {?>
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
                                <div class="form-group">
                                    <label for="">Tags</label>
                                    <input class="form-control"  name="tags" value="<?php echo $result['tags']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control"  name="category">
                                        <?php
                                        $query = "SELECT * FROM list_category";
                                        $category = $database->select($query);
                                        if($category){
                                            while($categories = $category->fetch_assoc()){
                                                ?>
                                                <option <?php if($result['category'] == $categories['id']){ ?> selected="selected" <?php } ?> value="<?php echo $categories['id']; ?>"><?php echo $categories['name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Featured Image</label>
                                    <input type="file" name="image">
                                </div>
                                <div class="col-md-4">
                                    <img src="../<?php echo $result['image']; ?>" alt="" width="160px" height="120px">
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