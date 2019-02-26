<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(Session::get('userRole') != '1'){
    echo "<script type='text/javascript'> window.location ='index.php'; </script>";
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Compose Mail</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $to = mysqli_real_escape_string($database->link, $_POST['to']);
                                $from = mysqli_real_escape_string($database->link, $_POST['from']);
                                $subject = mysqli_real_escape_string($database->link, $_POST['subject']);
                                $body = mysqli_real_escape_string($database->link, $_POST['body']);
                                if($to == "" || $subject == "" || $body == ""){
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                }else{
                                    $sendmail = mail($to, $from, $subject, $body);
                                    if($sendmail){
                                        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Mail sent successfully !</div>";
                                    }else{
                                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Something Went Wrong !</div>";
                                    }
                                }
                        }
                        ?>
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="to" placeholder="To: ">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="from" placeholder="From: ">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="subject" placeholder="Subject: ">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="body" rows="15" id="summernote" name="editordata"></textarea>
                                </div>
                                <input type="submit" name="publish" class="btn btn-success col-md-3" value="Send">
                            </div>
                        </form>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>
<script>
    $('#summernote').summernote({
        placeholder: 'Write mail here',
        tabsize: 2,
        height: 200
    });
</script>