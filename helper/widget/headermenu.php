<ul class="header--left">
    <?php
    $query = "SELECT * FROM list_footermenu ORDER BY id ASC";
    $data = $database->select($query);
    if($data){
        while($result = $data->fetch_assoc()){
            ?>
            <li> <a href="<?php echo $result['link']; ?>"><?php echo $result['title']; ?></a></li>
            <?php
        }
    }
    ?>
</ul>