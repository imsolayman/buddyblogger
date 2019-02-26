<div class="menus d-flex">
    <ul class="list-unstyled">
        <?php
        $query = "SELECT * FROM list_footermenu ORDER BY id ASC LIMIT 4";
        $data = $database->select($query);
        if($data){
            while($result = $data->fetch_assoc()){
                ?>
                <!--            widget here-->
                <li> <a href="<?php echo $result['link']; ?>"><?php echo $result['title']; ?></a></li>
                <?php
            }
        }
        ?>
    </ul>
    <ul class="list-unstyled">
        <?php
        $query = "SELECT * FROM list_footermenu ORDER BY id DESC LIMIT 4";
        $data = $database->select($query);
        if($data){
            while($result = $data->fetch_assoc()){
                ?>
                <!--            widget here-->
                <li> <a href="<?php echo $result['link']; ?>"><?php echo $result['title']; ?></a></li>
                <?php
            }
        }
        ?>
    </ul>
</div>