
<aside class="widget st--widget">
    <div class="st--widget--title">
        <h4>Trending Posts</h4>
    </div>
    <div class="st--widget--carousel--1">
        <?php
        $query = "SELECT list_posts.id, title, description, image, list_posts.created_at, list_posts.slug, list_posts.category, name, firstname, lastname, list_user.photo  FROM list_posts, list_category, list_user WHERE list_category.id = list_posts.category AND list_user.id = list_posts.author ORDER BY list_posts.id DESC";
        $post = $database->select($query);
        if($post) {
            while ($result = $post->fetch_assoc()) {
                ?>
                <div class="st--single">
                    <div class="st--inner">
                        <img src="admin/<?php echo $result['image']; ?>" alt="">
                        <div class="st--content">
                            <a href="#" class="st--tags"><?php echo $result['name']; ?></a>
                            <h5><a href="./<?php echo $result['slug']; ?>"><?php echo $result['title']; ?></a></h5>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>
    </div>
</aside>
<!-- /.widget -->

<aside class="widget st--widget">
    <?php
    $query = "SELECT * FROM list_ads WHERE id = '1'  ";
    $data = $database->select($query);
    $result = $data->fetch_assoc();
    $ad468 = $result['ad468'];
    echo $ad468;
    ?>
</aside>
<!-- /.widget -->

<aside class="widget st--widget">
    <div class="st--widget--title">
        <h4>Follow Us</h4>
    </div>
    <div class="st--social-follow">
        <div class="st--footer--social">
            <?php
            $query = "SELECT * FROM list_social";
            $data = $database->select($query);
            if($data){
                while($result = $data->fetch_assoc()){
                    ?>
                    <a href="<?php echo $result['facebook']; ?>" class="st--button--2 st--button facebook-bg"><i class="zmdi zmdi-facebook"></i> Like</a>
                    <a href="<?php echo $result['twitter']; ?>" class="st--button--2 st--button twitter-bg"><i class="zmdi zmdi-twitter"></i> Share</a>
                    <a href="<?php echo $result['linkedin']; ?>" class="st--button--2 st--button pinterest-bg"><i class="zmdi zmdi-linkedin"></i> Connection</a>
                    <a href="<?php echo $result['instagram']; ?>" class="st--button--2 st--button instagram-bg"><i class="zmdi zmdi-instagram"></i> Share</a>
                    <a href="<?php echo $result['skype']; ?>" class="st--button--2 st--button vk-bg"><i class="zmdi zmdi-skype"></i> Contact</a>
                    <a href="<?php echo $result['youtube']; ?>" class="st--button--2 st--button youtube-bg"><i class="zmdi zmdi-youtube"></i> Subscribe</a>
                    <?php
                }
            }
            ?>
        </div>
</aside>
<!-- /.widget -->

<aside class="widget  st--widget">
    <div class="st--widget--title">
        <h4>Categories</h4>
    </div>
    <div class="st--widget--inner--box">
        <ul>
            <?php
            $query = "SELECT * FROM list_category";
            $category = $database->select($query);
            if($category){
                while($result = $category->fetch_assoc()){
                    ?>

                    <li><a href="./category/<?php echo $result['slug']; ?>"><?php echo $result['name']; ?>
                            (
                            <?php
                            $catid = $result['id'];
                            $query = "SELECT * FROM list_posts WHERE category = '$catid' ";
                            $catcount = $database->select($query);
                            if($catcount){
                                $count = mysqli_num_rows($catcount);
                                echo $count;
                            }else{
                                echo 0;
                            }
                            ?>
                            )
                        </a></li>
                    <?php
                }
            }else{
                echo "<div class='item d-flex justify-content-between'><a href='#'>No Category Found</a></div>";
            }
            ?>
        </ul>
    </div>
</aside>
<!-- /.widget -->

<aside>
    <div class="st--widget--title">
        <h4>Twitter Feed</h4>
    </div>
    <div class="st--widget--inner--box st--tw--feed">
        <div class="tw--icon">
            <i class="zmdi zmdi-twitter"></i>
        </div>
        <div class="st--tw--content">
            <p>Vaccines reach more children than ever. If we set our sights high, we can give every child a shot at life. #VaccinesWork</p>
            <div class="dtc">
                <a href="#">@BillGates</a>
                <a href="#">17 hours Ago</a>
            </div>
            <div class="dt--btm">
                <a href="#" class="st--button twitter-bg">Follow</a>
                <a href="#"><i class="zmdi zmdi-favorite-outline"></i> 5.2k</a>
                <a href="#"><i class="zmdi zmdi-undo"></i> 171</a>
            </div>
        </div>
    </div>
</aside>
<!-- /.st-sidebar-column -->