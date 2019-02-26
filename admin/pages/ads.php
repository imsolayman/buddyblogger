<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(Session::get('userRole') != '1'){
    echo "<script type='text/javascript'> window.location ='index.php'; </script>";
}
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Publish Ads</h1>
            </div>
            <?php
            $query = "SELECT * FROM list_ads WHERE id = '1'  ";
            $data = $database->select($query);
            if($data){
            while($result = $data->fetch_assoc()){
            ?>
            <!-- /.col-lg-12 -->
            <!--            customize content starts here-->
            <!--            customize content starts here-->

                        <div class="col-lg-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Ad 728x90
                                </div>
                                <div class="panel-body">
                                    <?php
                                    if(isset($_POST["ad1"])){
                                        $ad728 = $_POST['ad728'];
                                            $query = "UPDATE list_ads
                                            SET 
                                            ad728 = '$ad728'
                                            WHERE
                                            id = '1' ";
                                            $updated_row = $database->update($query);
                                            if($updated_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Ads updated successfully !</div>";
                                            }else{
                                                echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Ads not updated !</div>";
                                            }

                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <textarea name="ad728" class="form-control" id="inputEmail3" ><?php echo $result['ad728']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-success mb-2" name="ad1" value="Update" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Ad 468x60
                                </div>
                                <div class="panel-body">
                                    <?php
                                    if(isset($_POST["ad2"])){
                                        $ad428 = $_POST['ad468'];
                                            $query = "UPDATE list_ads
                                            SET 
                                            ad468 = '$ad428'
                                            WHERE
                                            id = '1' ";
                                            $updated_row = $database->update($query);
                                            if($updated_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Ads updated successfully !</div>";
                                            }else{
                                                echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Ads not updated !</div>";
                                            }

                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <textarea name="ad468" class="form-control" id="inputEmail3"><?php echo $result['ad468']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-success mb-2" name="ad2" value="Update" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Ad 234x60
                                </div>
                                <div class="panel-body">
                                    <?php
                                    if(isset($_POST["ad3"])){
                                        $ad234 = $_POST['ad234'];
                                            $query = "UPDATE list_ads
                                            SET 
                                            ad234 = '$ad234'
                                            WHERE
                                            id = '1' ";
                                            $updated_row = $database->update($query);
                                            if($updated_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Ads updated successfully !</div>";
                                            }else{
                                                echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Ads not updated !</div>";
                                            }

                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                                <textarea name="ad234" class="form-control" id="inputEmail3" ><?php echo $result['ad234']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                                <input class="btn btn-success mb-2" name="ad3" value="Update" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <!-- /.col-lg-4 -->
                <?php }} ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>
<script>
    $('#summernote').summernote({
        placeholder: 'Write post here',
        tabsize: 2,
        height: 200
    });
</script>
