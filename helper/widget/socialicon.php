<ul class="header--right">
    <?php
    $query = "SELECT * FROM list_social";
    $data = $database->select($query);
    if($data){
        while($result = $data->fetch_assoc()){
            ?>
            <li>
                <a href="<?php echo $result['facebook']; ?>" class="zmdi zmdi-facebook"></a>
            </li>
            <li>
                <a href="<?php echo $result['twitter']; ?>" class="zmdi zmdi-twitter"></a>
            </li>
            <li>
                <a href="<?php echo $result['instagram']; ?>" class="zmdi zmdi-instagram"></a>
            </li>
            <li>
                <a href="<?php echo $result['skype']; ?>" class="zmdi zmdi-skype"></a>
            </li>
            <li>
                <a href="<?php echo $result['linkedin']; ?>" class="zmdi zmdi-linkedin"></a>
            </li>
            <li>
                <a href="<?php echo $result['youtube']; ?>" class="zmdi zmdi-youtube"></a>
            </li>
            <?php
        }
    }
    ?>
</ul>