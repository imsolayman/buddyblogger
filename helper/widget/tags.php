<div class="widget st--footer--widget">
    <div class="st--widget--title--2">
        <h4>Tags</h4>
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