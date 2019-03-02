<aside class="widget st--widget">
    <div class="st--widget--title">
        <h4>Trending Posts</h4>
    </div>
    <div class="st--widget--carousel--1">
        <?php
        $query = "SELECT list_posts.id, title, description, image, list_posts.created_at, list_posts.slug, list_posts.category, name, firstname, lastname, list_user.photo  FROM list_posts, list_category, list_user WHERE list_category.id = list_posts.category AND list_user.id = list_posts.author ORDER BY list_posts.id DESC";
        $post = $database->select($query);
        if($post) {
            while ($result = $post->fetch_assoc()) {
                ?>
                <div class="st--single">
                    <div class="st--inner">
                        <img src="admin/<?php echo $result['image']; ?>" alt="">
                        <div class="st--content">
                            <a href="./category/<?php echo $format->slug($result['name']); ?>" class="st--tags"><?php echo $result['name']; ?></a>
                            <h5><a href="./<?php echo $result['slug']; ?>"><?php echo $result['title']; ?></a></h5>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>
    </div>
</aside>