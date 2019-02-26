<div class="widget tags">
    <header>
        <h3 class="h6">Tags</h3>
    </header>
    <ul class="list-inline">
        <li class="list-inline-item">
    <?php
    $query = "SELECT tags FROM list_posts ORDER BY id DESC LIMIT 10";
    $tags = $database->select($query);
    if($tags){
    while($result = $tags->fetch_assoc()){
    $tagname = explode(',', $result['tags']);
    foreach ($tagname as $value){
    ?>
                <a href="#" class="tag">
                    <?php
                    echo '#'.$value;
                    ?>
                </a>
        <?php
    }
    }
    }
    ?>
        </li>
    </ul>
</div>