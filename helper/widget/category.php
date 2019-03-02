<aside class="widget  st--widget">
    <div class="st--widget--title">
        <h4>Categories</h4>
    </div>
    <div class="st--widget--inner--box">
        <ul>
            <?php
            $query = "SELECT * FROM list_category";
            $category = $database->select($query);
            if($category){
                while($result = $category->fetch_assoc()){
                    ?>

                    <li><a href="./category/<?php echo $result['slug']; ?>"><?php echo $result['name']; ?>
                            (
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
                            )
                        </a></li>
                    <?php
                }
            }else{
                echo "<div class='item d-flex justify-content-between'><a href='#'>No Category Found</a></div>";
            }
            ?>
        </ul>
    </div>
</aside>