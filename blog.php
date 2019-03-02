<?php include 'inc/header.php'; ?>
<div class="dh--breadcrumb--area" style="background-image: url(assets/img/breadcrumb-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Lifestyle Blog</h4>
            </div>
        </div>
    </div>
</div>
<div class="st--blog--area sp">
    <div class="container">
        <div class="row">
            <div class="col-md-8 st--post--column">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="st--block--title--1">
                            <h3>Latest Post</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $postPerPage = 8;
                    if(isset($_GET['pageid'])){
                        $id = $_GET['pageid'];
                    }else{
                        $id = 1;
                    }
                    $startFrom = ($id - 1) * $postPerPage;
                    ?>
                    <?php
                    $query = "SELECT list_posts.id, title, description, image, list_posts.created_at, list_posts.slug, list_posts.category, name, username, firstname, lastname  FROM list_posts, list_category, list_user WHERE list_category.id = list_posts.category AND list_user.id = list_posts.author ORDER BY list_posts.id DESC limit $startFrom, $postPerPage";
                    $post = $database->select($query);
                    if($post){
                    while ($result = $post->fetch_assoc()) {
                    ?>
                    <div class="col-sm-12 st--single--post--2 clearfix">
                        <div class="row">
                            <div class="st--post--left relative col-sm-6 post--height--2 flex_center">
                                <div class="st--inner">
                                    <div class="st--post--img">
                                        <img src="admin/<?php echo $result['image']; ?>" alt="">
                                    </div>
                                    <a href="./category/<?php echo $format->slug($result['name']); ?>" class="st--tags st--sticky--cat--1"><?php echo $result['name']; ?></a>
                                </div>
                            </div>
                            <div class="st--post--content col-sm-6 post--height--2 flex_center">
                                <div class="st--inner st--content--box">
                                    <h4><a href="./<?php echo $result['slug']; ?>"><?php echo $result['title']; ?></a></h4>
                                    <div class="st--post--meta st--info">
                                <span class="posted-by">
                            Posted by <a href="./author/<?php echo $result['username']; ?>" class="st--author"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></a>
                        </span>
                                    <span class="post-date">
                                    <a href="#"><?php echo $format->formatYear($result['created_at']); ?></a>
                                </span>
                                    </div>
                                    <p><?php echo $format->textShorten($result['description'], 180); ?></p>
                                    <a href="./<?php echo $result['slug']; ?>" class="st--button">Read More <i class="zmdi zmdi-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.st-single-post -->
                        <?php
                    }
                    ?>

                </div>
                <div class="st--pagination--1">
                    <ul>
                        <?php
                        $query = "SELECT * FROM list_posts";
                        $result = $database->select($query);
                        $totalPosts = mysqli_num_rows($result);
                        $totalPages = ceil($totalPosts / $postPerPage);
//                        echo "<li><a href='blog.php?pageid=1'>1</a></li>";
                        for($i = 1; $i <= $totalPages; $i++){
                            echo "<li><a href='blog.php?pageid=$i'>$i</a></li>";
                        }
                        echo "<li><a href='blog.php?pageid=$totalPages'> <i class='zmdi zmdi-long-arrow-right'></i></a></li>";
                        ?>
                    </ul>
                </div>

                <?php
                }else{
                    header('Location: 404.php');
                }
                ?>
            </div>
            <div class="col-md-4 st--sidebar--column">

                <?php include 'inc/sidebar.php'; ?>
                <!-- /.widget -->
            </div>
            <!-- /.st-sidebar-column -->
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
