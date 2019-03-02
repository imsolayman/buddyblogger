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