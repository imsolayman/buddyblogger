<?php include 'inc/header.php'; ?>
<?php
if(!isset($_GET['id']) || $_GET['id'] == null){
//                        header('Location: 404.php');
    echo "<script type='text/javascript'> window.location ='404.php'; </script>";
}else{
    $id = $_GET['id'];
}
?>
        <div class="dh--breadcrumb--area" style="background-image: url(assets/img/breadcrumb-bg.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4>Blog Details</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="st--post--area sp">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 about--col">
                        <?php
                        $query = "SELECT list_posts.id, title, description, image, tags, list_posts.created_at, list_posts.category, name, username, firstname, lastname, list_user.photo  FROM list_posts, list_category, list_user WHERE list_category.id = list_posts.category AND list_user.id = list_posts.author AND list_posts.slug = '$id' ";
                        $post = $database->select($query);
                        if($post){
                            while ($result = $post->fetch_assoc()) {
                                ?>

                        <div class="post--content--single">
                            <div class="post_img">
                                <img src="admin/<?php echo $result['image']; ?>" alt="">
                            </div>
                            <div class="st--tags st--info bg-2">
                                <a href="./category/<?php echo $format->slug($result['name']); ?>"><?php echo $result['name']; ?></a></a>
                            </div>
                            <h2><?php echo $result['title']; ?></h2>
                            <div class="st--meta st--info">
                                <div class="st--author--info clearfix">
                                    <div class="author--img pull-left">
                                        <img src="admin/<?php echo $result['photo']; ?>" alt="">
                                    </div>
                                    <a href="./author/<?php echo $result['username']; ?>" class="st--author"><?php echo $result['firstname'].' '.$result['lastname']; ?></a>
                                </div>
                                <a href="#" class="st--post--date"><?php echo $format->formatDate($result['created_at']); ?></a>
                            </div>
                            <p><?php echo $result['description']; ?></p>
                            <div class="tag--list">
                                <?php $tags = explode(',', $result['tags']);
                                foreach ($tags as $value){
                                    ?>
                                <div class="st--tags"><a href="#"> <?php
                                        echo $value;
                                        ?></a></div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                            }
                            }
                            ?>

                        <div class="related--post row">
                            <div class="col-sm-12">
                                <div class="st--block--title--1">
                                    <h3>Latest Post</h3>
                                </div>
                            </div>
                            <?php
                            $query = "SELECT list_posts.id, title, description, image, list_posts.created_at, list_posts.slug, list_posts.category, name, username, firstname, lastname, list_user.photo  FROM list_posts, list_category, list_user WHERE list_category.id = list_posts.category AND list_user.id = list_posts.author ORDER BY list_posts.id DESC LIMIT 2";
                            $post = $database->select($query);
                            if($post) {
                            while ($result = $post->fetch_assoc()) {
                            ?>
                            <div class="col-sm-6 st--single--post">
                                <div class="st--inner">
                                    <div class="st--post--top relative">
                                        <div class="st--post--img">
                                            <img src="admin/<?php echo $result['image']; ?>" alt="">
                                        </div>
                                        <a href="./category/<?php echo $format->slug($result['name']); ?>" class="st--tags st--sticky--cat--1"><?php echo $result['name']; ?></a>
                                    </div>
                                    <div class="st--post--content">
                                        <h4><a href="./<?php echo $result['slug']; ?>"><?php echo $result['title']; ?></a></h4>
                                        <div class="st--post--meta st--info">
                                            <span class="posted-by">
                                        Posted by <a href="./author/<?php echo $result['username']; ?>" class="st--author"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></a>
                                    </span>
                                            <span class="post-date">
                                        <a href="#"><?php echo $format->formatYear($result['created_at']); ?></a>
                                    </span>
                                        </div>
                                        <p><?php echo $format->textShorten($result['description'], 140); ?></p>
                                        <a href="./<?php echo $result['slug']; ?>" class="st--button">Read More <i class="zmdi zmdi-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>


                                <?php
                            }
                            }
                            ?>
                            <!-- /.st-single-post -->
                        </div>

                        <div class="st--comment row">
                            <?php
                            $getquery = "SELECT *  FROM list_posts WHERE slug = '$id' ";
                            $getdata = $database->select($getquery);
                            $getresult = $getdata->fetch_assoc();
                            $getid = $getresult['id'];
                            $query = "SELECT *  FROM list_comment WHERE post = '$getid' AND status = '1' ";
                            $comment = $database->select($query);
                            //                    $comments = mysqli_num_rows($comment);
                            ?>
                            <div class="col-sm-12">
                                <div class="st--block--title--1">
                                    <h3>Comments (<?php if($comment){
                                            $count = mysqli_num_rows($comment);
                                            echo $count;
                                        }else{
                                            echo 0;
                                        } ?>)</h3>
                                </div>
                            </div>
                            <?php
                            if($comment){
                            while ($result = $comment->fetch_assoc()) {
                            ?>
                            <div class="st--comments">
                                <div class="single--comment">
                                    <div class="comment--left">
                                        <img src="assets/img/user.svg" alt="">
                                    </div>
                                    <div class="comment--right">
                                        <h5><?php echo $result['name']; ?></h5>
                                        <span><?php echo $format->formatYear($result['created_at']); ?></span>
                                        <p><?php echo $result['comment']; ?> </p>
                                    </div>
                                    <a href="#reply" class="reply">Reply</a>
                                </div>
                            </div>
                                <?php
                            }
                            }
                            ?>
                        </div>

                        <div class="comment--form row"  id="reply">
                            <div class="col-sm-12">
                                <div class="st--block--title--1">
                                    <h3>Leave a reply</h3>
                                </div>
                            </div>

                            <div class="st--contact col-md-12">
                                <?php
                                if(isset($_POST["addcomment"])){
                                    $name = $format->validation($_POST['name']);
                                    $email = $format->validation($_POST['email']);
                                    $comment = $_POST['comment'];
                                    $name = mysqli_real_escape_string($database->link, $name);
                                    $email = mysqli_real_escape_string($database->link, $email);
                                    $ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);

                                    if($name == "" || $email == "" || $comment == ""){
                                        echo "<button class='btn btn-danger'>Error ! Field must not be empty</button>";
                                    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        echo "<button class='btn btn-danger'>Error ! Please enter a valid email address</button>";
                                    }else {
                                        $query = "INSERT INTO list_comment (post, name, email, comment, ip) VALUES ('$getid', '$name', '$email', '$comment', '$ip') ";
                                        $insert_row = $database->insert($query);
                                        if ($insert_row) {
                                            echo "<button class='btn btn-success'>Thanks ! Your comment is awaiting for moderation</button>";
                                        } else {
                                            echo "<button class='btn btn-danger'>Error ! Something went woring</button>";
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="post">
                                    <div class="row" >
                                        <div class="col-sm-6">
                                            <input type="text" name="name" placeholder="Your Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" name="email" placeholder="Your Email">
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea placeholder="Write your message" name="comment"></textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="submit" name="addcomment" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1 st--sidebar--column">
                        <?php include 'inc/sidebar.php'; ?>
                        <!-- /.widget -->
                    </div>
                    <!-- /.st-sidebar-column -->
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>
