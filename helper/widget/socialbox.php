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