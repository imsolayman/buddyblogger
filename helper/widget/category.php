<div class="widget categories">
    <header>
        <h3 class="h6">Categories</h3>
    </header>
    <?php
    $query = "SELECT * FROM list_category";
    $category = $database->select($query);
    if($category){
        while($result = $category->fetch_assoc()){
            ?>

            <div class="item d-flex justify-content-between"><a href="./categories/<?php echo $result['slug']; ?>"><?php echo $result['name']; ?></a>
                <span>
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
             </span>
            </div> <!--here is one static value-->
            <?php
        }
    }else{
        echo "<div class='item d-flex justify-content-between'><a href='#'>No Category Found</a></div>";
    }
    ?>
</div>