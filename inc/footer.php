
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
                <div class="col-md-4 col-sm-6">
                    <div class="widget st--footer--widget">
                        <a href="<?php echo SITE_URL; ?>" class="footer--logo">
                            <?php
                            $query = "SELECT * FROM list_customize WHERE id = '1'  ";
                            $data = $database->select($query);
                            if($data){
                                while($result = $data->fetch_assoc()){
                                    ?>
                                    <img src="admin/<?php echo $result['logo']; ?>" alt="">
                                    <?php
                                }
                            }
                            ?>
                        </a>
                        <p>Stylish is a blog and magazine theme for all compnay who are looking for blog magazine template.we try to create a with more stylish also great UI .</p>
                        <div class="st--footer--social">
                            <?php
                            $query = "SELECT * FROM list_social";
                            $data = $database->select($query);
                            if($data){
                                while($result = $data->fetch_assoc()){
                                    ?>
                                        <a href="<?php echo $result['facebook']; ?>" class="zmdi zmdi-facebook"></a>
                                        <a href="<?php echo $result['twitter']; ?>" class="zmdi zmdi-twitter"></a>
                                        <a href="<?php echo $result['instagram']; ?>" class="zmdi zmdi-instagram"></a>
                                        <a href="<?php echo $result['skype']; ?>" class="zmdi zmdi-skype"></a>
                                        <a href="<?php echo $result['linkedin']; ?>" class="zmdi zmdi-linkedin"></a>
                                        <a href="<?php echo $result['youtube']; ?>" class="zmdi zmdi-youtube"></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="widget st--footer--widget">
                        <div class="st--widget--title--2">
                            <h4>Recent Post</h4>
                        </div>
                        <div class="st--recent--postbox--1">
                            <?php
                            $query = "SELECT * FROM list_posts ORDER BY id DESC LIMIT 3";
                            $post = $database->select($query);
                            if($post){
                            while($result = $post->fetch_assoc()){
                            ?>
                            <div class="st--single">
                                <div class="pull-left">
                                    <div class="st--recent--img" style="background-image: url(admin/<?php echo $result['image']; ?>)"></div>
                                </div>
                                <div class="st--recent--content">
                                    <h5><a href="./<?php echo $result['slug']; ?>"><?php echo $result['title']; ?></a></h5>
                                    <a href="#" class="st--date"><?php echo $format->formatDate($result['created_at']); ?></a>
                                </div>
                            </div>
                                <?php
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="widget st--footer--widget">
                        <div class="st--widget--title--2">
                            <h4>Recent Post</h4>
                        </div>
                        <div class="st--footer--inner st--tag--group--1">
                            <?php
                            $query = "SELECT tags FROM list_posts ORDER BY id DESC LIMIT 10";
                            $tags = $database->select($query);
                            if($tags){
                            while($result = $tags->fetch_assoc()){
                            $tagname = explode(',', $result['tags']);
                            foreach ($tagname as $value){
                            ?>
                            <a href="#" class="st--button--3 sm"><?php
                                echo $value;
                                ?></a>
                                <?php
                            }
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
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
                        <a href="<?php echo SITE_URL; ?>privacy-policy">Privacy Policy</a>
                        <a href="<?php echo SITE_URL; ?>terms-and-conditions">Terms & Conditions</a>
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


<!-- Mirrored from static.crazycafe.net/crazycafe/stylish/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Jan 2019 10:42:21 GMT -->
</html>
