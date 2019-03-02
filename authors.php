<?php include 'inc/header.php'; ?>

<?php
if(!isset($_GET['author']) || $_GET['author'] == null){
//                            header("Location: 404.php");
    echo "<script type='text/javascript'> window.location ='404.php'; </script>";
}else{
    $author = $_GET['author'];
}
?>
<div class="dh--breadcrumb--area" style="background-image: url(assets/img/breadcrumb-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>
                    <?php
                    echo ucwords($author).' Profile';
                    ?>
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="st--blog--area sp">
    <div class="container">
        <div class="row">
            <div class="col-md-8 st--single--team">
                <?php
                $query = "SELECT * FROM list_user WHERE username = '$author' ";
                $profile = $database->select($query);
                if($profile){
                while($result = $profile->fetch_assoc()){
                ?>
                <div class="st--inner">
                    <div class="st--top">
                        <div class="st--team--img">
                            <img src="admin/<?php echo $result['photo'] ?>" alt="">
                        </div>
                        <div class="st--team--info">
                            <h5><?php echo $result['firstname'].' '.$result['lastname']; ?></h5>
                            <span>Author</span>
                        </div>
                    </div>
                    <div class="st--content">
                        <div class="single-item">
                            Website: <?php echo $result['website'] ?>
                        </div>
                        <p><?php echo $result['details'] ?></p>
                        <div class="st--team--social">
<!--                            <a href="#" class="fa fa-facebook"></a>-->
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
            <div class="col-md-4 st--sidebar--column">

                <?php include 'inc/sidebar.php'; ?>
                <!-- /.widget -->
            </div>
            <!-- /.st-sidebar-column -->
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
