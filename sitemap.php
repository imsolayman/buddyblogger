<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'lib/Format.php'; ?>
<?php
$database = new Database();
$format = new Format();
?>
<?php
$query = "SELECT checksitemap FROM list_seo";
$check = $database->select($query);
while($row = mysqli_fetch_array($check)){
    if($row['checksitemap'] != 1){
        header('Location:index.php');
    }else{
        define("POST_URL", "http://theblog.test/posts/");
?>
<?php
//sitemap.php

$query = "SELECT slug, created_at FROM list_posts";
$sitemap = $database->select($query);

header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

if($sitemap){
    while($result = $sitemap->fetch_assoc())
    {
        echo '<url>' . PHP_EOL;
        echo '<loc>'.POST_URL. $result['slug'] .'</loc>' . PHP_EOL;
        echo '<lastmod>'.$format->formatDate($result['created_at']).'</lastmod>' . PHP_EOL;
        echo '<changefreq>daily</changefreq>' . PHP_EOL;
        echo '</url>' . PHP_EOL;
    }
}

echo '</urlset>' . PHP_EOL;

?>
<?php
    }
}
?>