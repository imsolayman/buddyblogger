<div class="widget st--footer--widget">
    <div class="st--widget--title--2">
        <h4>Recent Post</h4>
    </div>
    <div class="st--recent--postbox--1">
        <?php
        $query = "SELECT * FROM list_posts ORDER BY id DESC LIMIT 2";
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