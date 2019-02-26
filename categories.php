<?php include 'inc/header.php'; ?>

<?php
if(!isset($_GET['category']) || $_GET['category'] == null){
//                            header("Location: 404.php");
    echo "<script type='text/javascript'> window.location ='404.php'; </script>";
}else{
    $category = $_GET['category'];
}
?>
    <div class="dh--breadcrumb--area" style="background-image: url(assets/img/breadcrumb-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>
                        <?php
                        $tiltequery = "SELECT *  FROM list_category WHERE slug = '$category' ";
                        $gettitle = $database->select($tiltequery);
                        $titleresult = $gettitle->fetch_assoc();
                        $title = $titleresult['name'];
                        echo $title.' Blog';
                        ?>
                    </h4>
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
                        $getquery = "SELECT *  FROM list_category WHERE slug = '$category' ";
                        $getdata = $database->select($getquery);
                        if($getdata){
                        while($getresult = $getdata->fetch_assoc()) {
                        ?>

                        <?php
                        $getid = $getresult['id'];
                        $getname = $getresult['name'];
                        $query = "SELECT *  FROM list_posts WHERE category = '$getid' LIMIT 6";
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
                                        <a href="#" class="st--tags st--sticky--cat--1"><?php echo $getresult['name']; ?></a>
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

                            <?php
                        }
                        }
                        ?>

                    </div>
                    <div class="st--pagination--1">
                        <ul>
                            <li><a href="#">1</a></li>
                            <li><span>2</span></li>
                            <li><a href="#"><i class="zmdi zmdi-long-arrow-right"></i></a></li>
                        </ul>
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
