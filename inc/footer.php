
<!-- /.st-blog-area-1 -->
<div class="st--instagram--1">
    <?php
    $query = "SELECT * FROM list_posts ORDER BY id DESC LIMIT 6";
    $post = $database->select($query);
    if($post){
    while($result = $post->fetch_assoc()){
    ?>
    <div class="st--single--insta st--eq--height" style="background-image: url(admin/<?php echo $result['image']; ?>)">
        <div class="st--inner">
            <div class="st--btn--wrap">
                <?php
                $query = "SELECT * FROM list_social";
                $instrgram = $database->select($query);
                $resultinsta = $instrgram->fetch_assoc();
                $getinsta = $resultinsta['instagram'];
                ?>
                <a href="<?php echo $getinsta; ?>" target="_blank" class="st--button--3"><i class="zmdi zmdi-instagram"></i> Follow Us</a>
            </div>
        </div>
    </div>
        <?php
    }
    }
    ?>
</div>
<!-- /.st-instagram-1 -->
<div class="st--cta--1 st--sp--65 st--dark--bg--1">
    <div class="container">
        <div class="row">
            <div class="col-md-7 cta--height--1 flex_center">
                <div class="st--cta--inner">
                    <h3>Subscribe to our newslater</h3>
                    <span>Get the best viral stories straight into your inbox! Don’t Worry we don’t Spam..</span>
                </div>
            </div>
            <div class="col-md-5 cta--height--1 flex_center">
                <div class="st--cta--inner">
                    <div class="st--newsletter--1">
                        <?php
                        if(isset($_POST["newsletter"])){
                            $email = $format->validation($_POST["email"]);
                            $email = mysqli_real_escape_string($database->link, $email);
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                echo "<script>alert('Invalid email address ! Please enter a valid email');</script>";
                            }else {
                                $query = "INSERT INTO list_subscribe (email) VALUES ('$email') ";
                                $insert_row = $database->insert($query);
                                if ($insert_row) {
                                    echo "<script>alert('Thanks for your subscription');</script>";
                                } else {
                                    echo "<script>alert('Sorry ! Mail is not subscribed');</script>";
                                }
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <div class="st--inner">
                                <input type="email" name="email" placeholder="Enter your email here" required="">
                                <button type="submit" name="newsletter">subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.st-cta-1 -->

<footer class="footer st--footer--1">
    <div class="st--footer--top st--sp--65 st--dark--bg--2">
        <div class="container">
            <div class="row">
                <?php
                $query = "SELECT * FROM list_widget WHERE id = '1'";
                $data = $database->select($query);
                if($data){
                while($widget = $data->fetch_assoc()){
                ?>
                <div class="col-md-4 col-sm-6">
                    <?php
                    if(!empty($widget['footer1'])){
                        $name = $widget['footer1'];
//                $name =  $widget["{$sidebar1}"];
                        if($name == 'category'){
                            include 'helper/widget/category.php';
                        }elseif($name == 'contactinfo'){
                            include 'helper/widget/contactinfo.php';
                        }elseif($name == 'headermenu'){
                            include 'helper/widget/headermenu.php';
                        }elseif($name == 'newsletter'){
                            include 'helper/widget/newsletter.php';
                        }elseif($name == 'recentpost'){
                            include 'helper/widget/recentpost.php';
                        }elseif($name == 'searchbox'){
                            include 'helper/widget/searchbox.php';
                        }elseif($name == 'socialicon'){
                            include 'helper/widget/socialicon.php';
                        }elseif($name == 'tags'){
                            include 'helper/widget/tags.php';
                        }elseif($name == 'adsbox'){
                            include 'helper/widget/adsbox.php';
                        }elseif($name == 'socialbox'){
                            include 'helper/widget/socialbox.php';
                        }elseif($name == 'trendingposts'){
                            include 'helper/widget/trendingposts.php';
                        }elseif($name == 'twitterfeed'){
                            include 'helper/widget/twitterfeed.php';
                        }
                    }else{
                        echo "";
                    }
                    ?>

                </div>
                <div class="col-md-4 col-sm-6">
                    <?php
                    if(!empty($widget['footer2'])){
                        $name = $widget['footer2'];
//                $name =  $widget["{$sidebar1}"];
                        if($name == 'category'){
                            include 'helper/widget/category.php';
                        }elseif($name == 'contactinfo'){
                            include 'helper/widget/contactinfo.php';
                        }elseif($name == 'headermenu'){
                            include 'helper/widget/headermenu.php';
                        }elseif($name == 'newsletter'){
                            include 'helper/widget/newsletter.php';
                        }elseif($name == 'recentpost'){
                            include 'helper/widget/recentpost.php';
                        }elseif($name == 'searchbox'){
                            include 'helper/widget/searchbox.php';
                        }elseif($name == 'socialicon'){
                            include 'helper/widget/socialicon.php';
                        }elseif($name == 'tags'){
                            include 'helper/widget/tags.php';
                        }elseif($name == 'adsbox'){
                            include 'helper/widget/adsbox.php';
                        }elseif($name == 'socialbox'){
                            include 'helper/widget/socialbox.php';
                        }elseif($name == 'trendingposts'){
                            include 'helper/widget/trendingposts.php';
                        }elseif($name == 'twitterfeed'){
                            include 'helper/widget/twitterfeed.php';
                        }
                    }else{
                        echo "";
                    }
                    ?>


                </div>
                <div class="col-md-4 col-sm-12">
                    <?php
                    if(!empty($widget['footer3'])){
                        $name = $widget['footer3'];
//                $name =  $widget["{$sidebar1}"];
                        if($name == 'category'){
                            include 'helper/widget/category.php';
                        }elseif($name == 'contactinfo'){
                            include 'helper/widget/contactinfo.php';
                        }elseif($name == 'headermenu'){
                            include 'helper/widget/headermenu.php';
                        }elseif($name == 'newsletter'){
                            include 'helper/widget/newsletter.php';
                        }elseif($name == 'recentpost'){
                            include 'helper/widget/recentpost.php';
                        }elseif($name == 'searchbox'){
                            include 'helper/widget/searchbox.php';
                        }elseif($name == 'socialicon'){
                            include 'helper/widget/socialicon.php';
                        }elseif($name == 'tags'){
                            include 'helper/widget/tags.php';
                        }elseif($name == 'adsbox'){
                            include 'helper/widget/adsbox.php';
                        }elseif($name == 'socialbox'){
                            include 'helper/widget/socialbox.php';
                        }elseif($name == 'trendingposts'){
                            include 'helper/widget/trendingposts.php';
                        }elseif($name == 'twitterfeed'){
                            include 'helper/widget/twitterfeed.php';
                        }
                    }else{
                        echo "";
                    }
                    ?>

                </div>
             <?php }} ?>
            </div>
        </div>
    </div>
    <div class="st--footer--btm st--dark--bg--3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <?php
                    $query = "SELECT * FROM list_customize";
                    $post = $database->select($query);
                    if($post){
                        while($result = $post->fetch_assoc()){
                            ?>
                            <span>&copy; <?php echo $result['copyright']; ?></span>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="st--footer--link">
                        <a href="<?php echo SITE_URL; ?>page/privacy-policy">Privacy Policy</a>
                        <a href="<?php echo SITE_URL; ?>page/terms-and-conditions">Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->
<!-- Vendors (All Essential JavaScript plugins) -->

<!-- bootstrap -->
<script type="text/javascript" src="assets/js/vendor/bootstrap.min.js"></script>
<!-- magnific -->
<script type="text/javascript" src="assets/js/vendor/magnific.popup.min.js"></script>
<!-- slick -->
<script type="text/javascript" src="assets/js/vendor/slick.min.js"></script>
<!-- slicknav -->
<script type="text/javascript" src="assets/js/vendor/slicknav.min.js"></script>
<!-- masonry -->
<script type="text/javascript" src="assets/js/vendor/masonry.pkgd.min.js"></script>
<!-- web ticker -->
<script type="text/javascript" src="assets/js/vendor/web.ticker.min.js"></script>
<!-- active -->
<script type="text/javascript" src="assets/js/active.js"></script>

</div>
<!-- end .site_wrap -->
</body>


</html>
