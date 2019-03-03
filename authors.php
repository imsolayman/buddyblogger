<?php include 'inc/header.php'; ?>

<?php
if(!isset($_GET['author']) || $_GET['author'] == null){
//                            header("Location: 404.php");
    echo "<script type='text/javascript'> window.location ='404.php'; </script>";
}else{
    $author = $_GET['author'];
}
?>
<div class="dh--breadcrumb--area" style="background-image: url(assets/img/breadcrumb-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>
                    <?php
                    $getquery = "SELECT * FROM list_user WHERE username = '$author' ";
                    $getid = $database->select($getquery);
                    $getresult = $getid->fetch_assoc();
                    $authorid = $getresult['id'];
                    echo $getresult['firstname'].' '.$getresult['lastname'].' Profile';
                    ?>
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="st--blog--area sp">
    <div class="container">
        <div class="row">

            <div class="col-md-8 st--single--team">
            </div>
            <div class="col-md-8 st--post--column">
                <div class="st--single--team">
                    <?php
                    $query = "SELECT * FROM list_user WHERE username = '$author' ";
                    $profile = $database->select($query);
                    if($profile){
                        while($result = $profile->fetch_assoc()){
                            ?>
                            <div class="st--inner">
                                <div class="st--top">
                                    <div class="st--team--img">
                                        <img src="admin/<?php echo $result['photo'] ?>" alt="">
                                    </div>
                                    <div class="st--team--info">
                                        <h5><?php echo $result['firstname'].' '.$result['lastname']; ?></h5>
                                        <span>Author</span>
                                    </div>
                                </div>
                                <div class="st--content">
                                    <div class="single-item">
                                        Website: <a href="<?php echo $result['website'] ?>" target="_blank"><?php echo $result['website'] ?></a>
                                    </div>
                                    <p>Author Details: <?php echo $result['details'] ?></p>
                                    <div class="st--team--social">
                                        <!--                            <a href="#" class="fa fa-facebook"></a>-->
                                    </div>
                                </div>
                            </div>
                        <?php }} ?>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="st--block--title--1">
                            <h3><?php echo $getresult['firstname'].' '.$getresult['lastname']; ?>'s Post</h3>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php
                    $query = "SELECT *  FROM list_posts WHERE author = '$authorid' LIMIT 10";
                    $post = $database->select($query);
                    if ($post) {
                        while ($result = $post->fetch_assoc()) {
                            ?>
                            <div class="col-sm-12 st--single--post--2 clearfix">
                                <div class="row">
                                    <div class="st--post--left relative col-sm-6 post--height--2 flex_center">
                                        <div class="st--inner">
                                            <div class="st--post--img">
                                                <img src="admin/<?php echo $result['image']; ?>" alt="">
                                            </div>
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
                            <!-- /.st-single-post -->
                            <?php
                        }
                    }else{
                        echo "  <div class='col-md-12'><div class='page-not-found'> <h1 class='text-center'>Posts not found!!</h1> <p class='text-center'><a href='index.php'>Homepage</a></p></div> </div>";
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
