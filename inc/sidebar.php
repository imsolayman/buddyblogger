<?php
$query = "SELECT * FROM list_widget WHERE id = '1'";
$data = $database->select($query);
if($data){
while($widget = $data->fetch_assoc()){
?>


    <?php
    if(!empty($widget['sidebar1'])){
        $name = $widget['sidebar1'];
//                $name =  $widget["{$sidebar1}"];
        if($name == 'category'){
            include 'helper/widget/category.php';
        }elseif($name == 'contactinfo'){
            include 'helper/widget/contactinfo.php';
        }elseif($name == 'headermenu'){
            include 'helper/widget/headermenu.php';
        }elseif($name == 'newsletter'){
            include 'helper/widget/newsletter.php';
        }elseif($name == 'recentpost'){
            include 'helper/widget/recentpost.php';
        }elseif($name == 'searchbox'){
            include 'helper/widget/searchbox.php';
        }elseif($name == 'socialicon'){
            include 'helper/widget/socialicon.php';
        }elseif($name == 'tags'){
            include 'helper/widget/tags.php';
        }elseif($name == 'adsbox'){
            include 'helper/widget/adsbox.php';
        }elseif($name == 'socialbox'){
            include 'helper/widget/socialbox.php';
        }elseif($name == 'trendingposts'){
            include 'helper/widget/trendingposts.php';
        }elseif($name == 'twitterfeed'){
            include 'helper/widget/twitterfeed.php';
        }
    }else{
        echo "";
    }
    ?>
<!-- /.widget -->
    <?php
    if(!empty($widget['sidebar2'])){
        $name = $widget['sidebar2'];
//                $name =  $widget["{$sidebar1}"];
        if($name == 'category'){
            include 'helper/widget/category.php';
        }elseif($name == 'contactinfo'){
            include 'helper/widget/contactinfo.php';
        }elseif($name == 'headermenu'){
            include 'helper/widget/headermenu.php';
        }elseif($name == 'newsletter'){
            include 'helper/widget/newsletter.php';
        }elseif($name == 'recentpost'){
            include 'helper/widget/recentpost.php';
        }elseif($name == 'searchbox'){
            include 'helper/widget/searchbox.php';
        }elseif($name == 'socialicon'){
            include 'helper/widget/socialicon.php';
        }elseif($name == 'tags'){
            include 'helper/widget/tags.php';
        }elseif($name == 'adsbox'){
            include 'helper/widget/adsbox.php';
        }elseif($name == 'socialbox'){
            include 'helper/widget/socialbox.php';
        }elseif($name == 'trendingposts'){
            include 'helper/widget/trendingposts.php';
        }elseif($name == 'twitterfeed'){
            include 'helper/widget/twitterfeed.php';
        }
    }else{
        echo "";
    }
    ?>
<!-- /.widget -->

    <?php
    if(!empty($widget['sidebar3'])){
        $name = $widget['sidebar3'];
//                $name =  $widget["{$sidebar1}"];
        if($name == 'category'){
            include 'helper/widget/category.php';
        }elseif($name == 'contactinfo'){
            include 'helper/widget/contactinfo.php';
        }elseif($name == 'headermenu'){
            include 'helper/widget/headermenu.php';
        }elseif($name == 'newsletter'){
            include 'helper/widget/newsletter.php';
        }elseif($name == 'recentpost'){
            include 'helper/widget/recentpost.php';
        }elseif($name == 'searchbox'){
            include 'helper/widget/searchbox.php';
        }elseif($name == 'socialicon'){
            include 'helper/widget/socialicon.php';
        }elseif($name == 'tags'){
            include 'helper/widget/tags.php';
        }elseif($name == 'adsbox'){
            include 'helper/widget/adsbox.php';
        }elseif($name == 'socialbox'){
            include 'helper/widget/socialbox.php';
        }elseif($name == 'trendingposts'){
            include 'helper/widget/trendingposts.php';
        }elseif($name == 'twitterfeed'){
            include 'helper/widget/twitterfeed.php';
        }
    }else{
        echo "";
    }
    ?>
<!-- /.widget -->

    <?php
    if(!empty($widget['sidebar4'])){
        $name = $widget['sidebar4'];
//                $name =  $widget["{$sidebar1}"];
        if($name == 'category'){
            include 'helper/widget/category.php';
        }elseif($name == 'contactinfo'){
            include 'helper/widget/contactinfo.php';
        }elseif($name == 'headermenu'){
            include 'helper/widget/headermenu.php';
        }elseif($name == 'newsletter'){
            include 'helper/widget/newsletter.php';
        }elseif($name == 'recentpost'){
            include 'helper/widget/recentpost.php';
        }elseif($name == 'searchbox'){
            include 'helper/widget/searchbox.php';
        }elseif($name == 'socialicon'){
            include 'helper/widget/socialicon.php';
        }elseif($name == 'tags'){
            include 'helper/widget/tags.php';
        }elseif($name == 'adsbox'){
            include 'helper/widget/adsbox.php';
        }elseif($name == 'socialbox'){
            include 'helper/widget/socialbox.php';
        }elseif($name == 'trendingposts'){
            include 'helper/widget/trendingposts.php';
        }elseif($name == 'twitterfeed'){
            include 'helper/widget/twitterfeed.php';
        }
    }else{
        echo "";
    }
    ?>
<!-- /.widget -->

    <?php
    if(!empty($widget['sidebar5'])){
        $name = $widget['sidebar5'];
//                $name =  $widget["{$sidebar1}"];
        if($name == 'category'){
            include 'helper/widget/category.php';
        }elseif($name == 'contactinfo'){
            include 'helper/widget/contactinfo.php';
        }elseif($name == 'headermenu'){
            include 'helper/widget/headermenu.php';
        }elseif($name == 'newsletter'){
            include 'helper/widget/newsletter.php';
        }elseif($name == 'recentpost'){
            include 'helper/widget/recentpost.php';
        }elseif($name == 'searchbox'){
            include 'helper/widget/searchbox.php';
        }elseif($name == 'socialicon'){
            include 'helper/widget/socialicon.php';
        }elseif($name == 'tags'){
            include 'helper/widget/tags.php';
        }elseif($name == 'adsbox'){
            include 'helper/widget/adsbox.php';
        }elseif($name == 'socialbox'){
            include 'helper/widget/socialbox.php';
        }elseif($name == 'trendingposts'){
            include 'helper/widget/trendingposts.php';
        }elseif($name == 'twitterfeed'){
            include 'helper/widget/twitterfeed.php';
        }
    }else{
        echo "";
    }
    ?>
<!-- /.st-sidebar-column -->

<?php }} ?>