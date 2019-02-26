<?php include 'config/config.php'; ?>
<?php include 'lib/database.php'; ?>
<?php include 'lib/format.php'; ?>
<?php
$database = new Database();
$format = new Format();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from static.crazycafe.net/crazycafe/stylish/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Jan 2019 10:41:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo SITE_URL; ?>" />
    <!--    meta contents-->
    <?php include 'helper/metadata.php'; ?>

    <title>Buddyblogger - The Blog That Talks</title>


    <!--bootstrap-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- material-icon -->
    <link href="assets/css/material-design-iconic-font.min.css" rel="stylesheet">
    <!-- owl -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <!-- animate css -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!-- owl.carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- sweet.alert.css -->
    <link rel="stylesheet" href="assets/css/sweet.alert.css">
    <!-- slicknav.css -->
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- mfg.css -->
    <link rel="stylesheet" href="assets/css/magnific.pupup.css">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <!-- <link rel="stylesheet" href="assets/rs-plugin/css/settings.css"> -->

    <!-- custom -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- custom -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700%7CNoto+Sans:400,700" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- jQuery -->

</head>

<body class="home">

<!-- preloader -->
<div class="preloader" aria-busy="true" aria-label="Loading, please wait." role="progressbar"></div>
<div class="preloader--main">
    <div class="st--inner">
        <span class="preloader-spin"></span>
    </div>
</div>
<div class="preloader btm" aria-busy="true" aria-label="Loading, please wait." role="progressbar"></div>

<div class="site_wrap">

    <header class="header st--header-1">
        <div class="header--top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="header--left">
                            <?php
                            $query = "SELECT * FROM list_footermenu ORDER BY id ASC";
                            $data = $database->select($query);
                            if($data){
                                while($result = $data->fetch_assoc()){
                                    ?>
                                    <li> <a href="<?php echo $result['link']; ?>"><?php echo $result['title']; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="header--right">
                            <?php
                            $query = "SELECT * FROM list_social";
                            $data = $database->select($query);
                            if($data){
                                while($result = $data->fetch_assoc()){
                                    ?>
                            <li>
                                <a href="<?php echo $result['facebook']; ?>" class="zmdi zmdi-facebook"></a>
                            </li>
                            <li>
                                <a href="<?php echo $result['twitter']; ?>" class="zmdi zmdi-twitter"></a>
                            </li>
                            <li>
                                <a href="<?php echo $result['instagram']; ?>" class="zmdi zmdi-instagram"></a>
                            </li>
                            <li>
                                <a href="<?php echo $result['skype']; ?>" class="zmdi zmdi-skype"></a>
                            </li>
                            <li>
                                <a href="<?php echo $result['linkedin']; ?>" class="zmdi zmdi-linkedin"></a>
                            </li>
                            <li>
                                <a href="<?php echo $result['youtube']; ?>" class="zmdi zmdi-youtube"></a>
                            </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo--area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 logo--column">
                        <?php
                        $query = "SELECT * FROM list_customize WHERE id = '1'  ";
                        $data = $database->select($query);
                        if($data){
                        while($result = $data->fetch_assoc()){
                        ?>
                        <a href="<?php echo SITE_URL; ?>" class="logo"><img src="admin/<?php echo $result['logo']; ?>" alt=""></a>
                            <?php
                        }
                        }
                        ?>
                    </div>
                    <div class="col-md-8 ads--column--1">
                        <a href="#" class="header--ads">

                            <?php
                            $query = "SELECT * FROM list_ads WHERE id = '1'  ";
                            $data = $database->select($query);
                            $result = $data->fetch_assoc();
                            $ad728 = $result['ad728'];
//                            echo $ad728;
                            ?>
                            <img src="assets/img/ads--1.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu--area header--bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 menu--column">
                        <nav class="main_menu">
                            <ul>
                                <?php
                                $query = "SELECT * FROM list_mainmenu ORDER BY id ASC";
                                $data = $database->select($query);
                                if($data){
                                while($result = $data->fetch_assoc()){
                                    $id = $result['id'];
                                    $submenu_id = $result['parent_id'];
                                ?>
                                <li>
                                    <?php if($submenu_id == NULL){ ?>
                                    <a href="<?php echo $result['link']; ?>"><?php echo $result['title']; ?></a>
                                    <?php } ?>



                                    <ul class='sub-menu'>
                                    <?php
                                    $subquery = "SELECT * FROM list_mainmenu WHERE parent_id = '$id' ";
                                    $submenu = $database->select($subquery);
                                    if($submenu){
                                        while($subresult = $submenu->fetch_assoc()){
                                        ?>
                                            <li>
                                                <a href="<?php echo $subresult['link']; ?>"><?php echo $subresult['title']; ?></a>
                                            </li>
                                     <?php }} ?>

                                    </ul>

                                </li>
                                    <?php
                                }
                                }else{
                                    ?>
                                    <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                                    <li><a href="<?php echo SITE_URL; ?>about">About Us</a></li>
                                    <li><a href="<?php echo SITE_URL; ?>blog">Blog</a></li>
                                    <li><a href="<?php echo SITE_URL; ?>contact">Contact Us</a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3 search--column">
                        <form action="search.php" method="get" class="st--search--box">
                            <div>
                                <input type="search" name="search" placeholder="Enter Keyword to Search">
                                <button type="submit"><i class="zmdi zmdi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /header -->