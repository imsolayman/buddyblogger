<?php

if(isset($_GET['title'])){
    $pageid = $_GET['title'];
    $query = "SELECT * FROM list_pages WHERE slug = '$pageid' ";
    $pages = $database->select($query);
    if($pages){
        while($result = $pages->fetch_assoc()){
            ?>
            <title><?php echo $result['title']; ?> - <?php echo TAGLINE; ?></title>
            <meta name="title" content="<?php echo $result['metatitle']; ?>">
            <meta name="description" content="<?php echo $result['metatitle']; ?>">
            <meta name="keywords" content="<?php echo $result['metakeywords']; ?>">
            <?php
        }
    }
}elseif(isset($_GET['id'])){
    $postid = $_GET['id'];
    $query = "SELECT * FROM list_posts WHERE slug = '$postid' ";
    $posts = $database->select($query);
    if($posts){
        while($result = $posts->fetch_assoc()){
            ?>
            <title><?php echo $result['title']; ?> - <?php echo TAGLINE; ?></title>
            <meta name="title" content="<?php echo $result['metatitle']; ?>">
            <meta name="description" content="<?php echo $result['metatitle']; ?>">
            <meta name="keywords" content="<?php echo $result['metakeywords']; ?>">
            <?php
        }
    }
}elseif(isset($_GET['category'])){
    $postid = $_GET['category'];
    $query = "SELECT * FROM list_category WHERE slug = '$postid' ";
    $posts = $database->select($query);
    if($posts){
        while($result = $posts->fetch_assoc()){
            ?>
            <title><?php echo $result['name']; ?> - <?php echo TAGLINE; ?></title>
            <meta name="title" content="<?php echo $result['name']; ?> - <?php echo TAGLINE; ?>">
            <?php
            $query = "SELECT * FROM list_seo WHERE id = '1' ";
            $homeid = $database->select($query);
            if($homeid){
                while($result = $homeid->fetch_assoc()){
                    ?>
                    <meta name="description" content="<?php echo $result['homedescription']; ?>">
                    <meta name="keywords" content="<?php echo $result['homekeyword']; ?>">

                    <?php
                }
            }
            ?>
            <?php
        }
    }
}else{
    ?>
    <?php
    $query = "SELECT * FROM list_seo WHERE id = '1' ";
    $homeid = $database->select($query);
    if($homeid){
    while($result = $homeid->fetch_assoc()){
    ?>
    <title><?php echo $format->title(); ?> - <?php echo TAGLINE; ?></title>
    <meta name="title" content="<?php echo $format->title(); ?> - <?php echo TAGLINE; ?>">
    <meta name="description" content="<?php echo $result['homedescription']; ?>">
    <meta name="keywords" content="<?php echo $result['homekeyword']; ?>">

    <?php
}
}
    ?>
    <?php
}
?>