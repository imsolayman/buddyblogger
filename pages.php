<?php include 'inc/header.php'; ?>
<?php
if(!isset($_GET['title']) || $_GET['title'] == NULL){
//    header("Location: 404.php");
    echo "<script type='text/javascript'> window.location ='404.php'; </script>";
}else{
    $id = $_GET['title'];
}
?>
<?php
$pagequery = "SELECT * FROM list_pages WHERE slug = '$id' ";
$pagedetails = $database->select($pagequery);
if($pagedetails){
while($result = $pagedetails->fetch_assoc()){
?>
<div class="dh--breadcrumb--area" style="background-image: url(assets/img/breadcrumb-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4><?php echo $result['title']; ?></h4>
            </div>
        </div>
    </div>
</div>
<div class="st--blog--area sp">
    <div class="container">
        <div class="row">
            <div class="col-md-7 about--col">
                <?php echo $result['description']; ?>

            </div>
            <div class="col-md-4 col-md-offset-1 st--sidebar--column">
                <?php include 'inc/sidebar.php'; ?>
                <!-- /.widget -->
            </div>
            <!-- /.st-sidebar-column -->
        </div>
    </div>
</div>

    <?php
}
}else{
    echo "<script type='text/javascript'> window.location ='404.php'; </script>";
}
?>

<?php include 'inc/footer.php'; ?>
