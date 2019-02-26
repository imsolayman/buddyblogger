<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(Session::get('userRole') != '1'){
    echo "<script type='text/javascript'> window.location ='index.php'; </script>";
}
?>
<?php
if(!isset($_GET['viewid']) || $_GET['viewid'] == NULL){
    echo "<script type='text/javascript'> window.location ='inbox.php'; </script>";
    //header("Location: posts.php");
}else{
    $id = $_GET['viewid'];
}
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Show Mail</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <?php
        $query = "SELECT * FROM list_contact WHERE id = '$id '";
        $mail = $database->select($query);
        if($mail){
            while($result = $mail->fetch_assoc()){
                ?>
                <div class="row">
                    <div class="panel panel-default">

                        <div class="panel-body viewmail">

                            <address>
                                <p><span>Subject : </span> <?php echo $result['subject']; ?> <span class="float-right"><?php echo $format->formatDate($result['created_at']); ?></span></p>
                                <p><span>From : </span> <a href="replymail.php?mailid=<?php echo $result['id']; ?>"><?php echo $result['email']; ?></a></p>
                                <p><span>Name : </span> <?php echo $result['name']; ?></p>
                            </address>
                        </div>
                    </div>
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <p><?php echo $result['description']; ?></p>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading m-t-20">
                            <div class="m-b-10 m-t-10"> Click here to <a href="replymail.php?mailid=<?php echo $result['id']; ?>">Reply</a> or <a href="replymail.php?mailid=<?php echo $result['id']; ?>">Forward</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>
