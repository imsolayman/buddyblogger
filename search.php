<?php include 'inc/header.php'; ?>


<?php
if(!isset($_GET['search']) || $_GET['search'] == null){
    header("Location: 404.php");
}else{
    $search = $_GET['search'];
}
?>
<div class="dh--breadcrumb--area" style="background-image: url(assets/img/breadcrumb-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Search Blog</h4>
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
                    $query = "SELECT *  FROM list_posts WHERE title like '%$search%'  OR description like '%$search%' ";
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
                                                    <a href="#" class="st--tags st--sticky--cat--1">Lifestyle</a>
                                                </div>
                                            </div>
                                            <div class="st--post--content col-sm-6 post--height--2 flex_center">
                                                <div class="st--inner st--content--box">
                                                    <h4><a href="./<?php echo $result['slug']; ?>"><?php echo $result['title']; ?></a></h4>
                                                    <div class="st--post--meta st--info">
                                            <span class="post-date">
                                            <a href="#"><?php echo $format->formatYear($result['created_at']); ?></a>
                                        </span>
                                                    </div>
                                                    <p><?php echo $format->textShorten($result['description'], 120); ?></p>
                                                    <a href="./<?php echo $result['slug']; ?>" class="st--button">Read More <i class="zmdi zmdi-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <?php
                    }
                    ?>
                                    <!-- /.st-single-post -->
                    <?php
                    }else{
                        echo "<h2 class='elseMessage'>Search result not found!!<span><a href='index.php'>Homepage</a></span></h2>";
                    }
                    ?>


                </div>
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
