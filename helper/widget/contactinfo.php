<div class="contact-details">
    <div class="logo">
        <?php
        $query = "SELECT * FROM list_customize";
        $data = $database->select($query);
        if($data){
            while($result = $data->fetch_assoc()){
                ?>
                <h6 class="text-white"><?php echo $result['title']; ?></h6>
                <?php
            }
        }
        ?>
    </div>
    <!--            widget here-->

    <p>53 Broadway, Broklyn, NY 11249</p>
    <p>Phone: (+88) 01650 604 060</p>
    <p>Email: Info@mycompany.com</p>

    <ul class="social-menu">
        <?php
        $query = "SELECT * FROM list_social";
        $data = $database->select($query);
        if($data){
            while($result = $data->fetch_assoc()){
                ?>
                <li class="list-inline-item"><a href="<?php echo $result['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="<?php echo $result['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="<?php echo $result['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="<?php echo $result['skype']; ?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                <li class="list-inline-item"><a href="<?php echo $result['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li class="list-inline-item"><a href="<?php echo $result['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                <?php
            }
        }
        ?>
    </ul>
</div>