<div class="widget latest-posts">
    <header>
        <h3 class="h6">Latest Posts</h3>
    </header>
    <div class="blog-posts">
        <?php
        $query = "SELECT * FROM list_posts ORDER BY id DESC LIMIT 3";
        $post = $database->select($query);
        if($post){
            while($result = $post->fetch_assoc()){
                ?>
                <!--            widget here-->
                <a href="./posts/<?php echo $result['slug']; ?>">
                    <div class="item d-flex align-items-center">
                        <div class="image"><img src="admin/<?php echo $result['image']; ?>" alt="..." class="img-fluid" width="60px" height="60px"></div>
                        <div class="title"><strong><?php echo $result['title']; ?></strong>
                            <div class="d-flex align-items-center">
                                <!--                            static elements-->
                                <div class="views"><i class="icon-eye"></i> 500</div>
                                <div class="comments"><i class="icon-comment"></i>12</div>
                            </div>
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        ?>
    </div>
</div>