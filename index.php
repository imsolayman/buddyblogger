<?php include 'inc/header.php'; ?>

        <div class="home--area--1">
            <div class="home--carousel--1 st--home--style--1">
<?php
$query = "SELECT list_posts.id, title, description, image, list_posts.created_at, list_posts.slug, list_posts.category, name, firstname, lastname, list_user.photo  FROM list_posts, list_category, list_user WHERE list_category.id = list_posts.category AND list_user.id = list_posts.author ORDER BY list_posts.id DESC";
$post = $database->select($query);
if($post) {
    while ($result = $post->fetch_assoc()) {
        ?>
        <div class="single--slide" style="background-image: url(admin/<?php echo $result['image']; ?>)">
            <div class="st--inner">
                <div class="st--tags st--info bg-1">
                    <a href="#"><?php echo $result['name']; ?></a></a>
                </div>
<!--                <h2><a href="post.php?id=--><?php //echo $result['id']; ?><!--">--><?php //echo $result['title']; ?><!--</a></h2>-->
                <h2><a href="./<?php echo $result['slug']; ?>"><?php echo $result['title']; ?></a></h2>
                <div class="st--meta st--info">
                    <div class="st--author--info clearfix">
                        <div class="author--img pull-left">
                            <img src="admin/<?php echo $result['photo']; ?>" alt="">
                        </div>
                        <a href="#" class="st--author"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></a>
                    </div>
                    <a href="#" class="st--post--date"><?php echo $format->formatDate($result['created_at']); ?></a>
                </div>
            </div>
        </div>

        <?php
    }
}
    ?>
            </div>
        </div>
        <!-- /.home-area-1 -->
        <div class="st--category--area sp">
            <div class="container">
                <div class="st--cat--carousel--1 st--arrow--style-3">
                    <?php
                    $query = "SELECT * FROM list_category";
                    $category = $database->select($query);
                    if($category) {
                        while ($result = $category->fetch_assoc()) {
                            ?>
                            <div class="st--single">
                                <a href="./category/<?php echo $result['slug']; ?>" class="st--inner">
                                    <img src="admin/upload/post/254802f7da.jpg" alt="">
                                    <div class="st--tags st--info bg-1">
                                        <span><?php echo $result['name']; ?></span>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /.st-category-area -->
        <div class="st--blog--area spb">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 st--post--column col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="st--block--title--1">
                                    <h3>Latest Post</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row st--common--masonry">
                        <?php
                        $postPerPage = 6;
                        if(isset($_GET['pageid'])){
                            $id = $_GET['pageid'];
                        }else{
                            $id = 1;
                        }
                        $startFrom = ($id - 1) * $postPerPage;
                        ?>
                        <?php
                        $query = "SELECT list_posts.id, title, description, image, list_posts.created_at, list_posts.slug, list_posts.category, name, firstname, lastname  FROM list_posts, list_category, list_user WHERE list_category.id = list_posts.category AND list_user.id = list_posts.author ORDER BY list_posts.id DESC limit $startFrom, $postPerPage";
                        $post = $database->select($query);
                        if($post){
                            while ($result = $post->fetch_assoc()) {
                                ?>
                            <div class="col-sm-6 st--single--post">
                                <div class="st--inner">
                                    <div class="st--post--top relative">
                                        <div class="st--post--img">
                                            <img src="admin/<?php echo $result['image']; ?>" alt="">
                                        </div>
                                        <a href="#" class="st--tags st--sticky--cat--1">Recipes</a>
                                        <a href="https://vimeo.com/179298651" class="st--vdo--btn st--pop-video"><i class="zmdi zmdi-play"></i></a>
                                    </div>
                                    <div class="st--post--content">
                                        <h4><a href="./<?php echo $result['slug']; ?>"><?php echo $result['title']; ?></a></h4>
                                        <div class="st--post--meta st--info">
                                            <span class="posted-by">
                                        Posted by <a href="#" class="st--author"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></a>
                                    </span>
                                            <span class="post-date">
                                        <a href="#"><?php echo $format->formatYear($result['created_at']); ?></a>
                                    </span>
                                        </div>
                                        <p><?php echo $format->textShorten($result['description'], 160); ?></p>
                                        <a href="./<?php echo $result['slug']; ?>" class="st--button">Read More <i class="zmdi zmdi-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                                <?php
                            }
                        ?>
                            <!-- /.st-single-post -->
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
                    <div class="col-md-4 st--sidebar--column col-sm-12">
                        <?php include 'inc/sidebar.php'; ?>
                    </div>
                    <!-- /.st-sidebar-column -->
                </div>
            </div>
        </div>
 <?php include 'inc/footer.php'; ?>