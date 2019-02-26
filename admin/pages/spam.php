<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Spam</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Spam Mails
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php
                    if(isset($_GET['restore'])){
                        $id = $_GET['restore'];
                        $query = "UPDATE list_contact SET status = '1' WHERE id = '$id' ";
                        $updated_row = $database->update($query);
                        if($updated_row){
                            echo "<script>alert('Mail has been restored !');</script>";
                        }else{
                            echo "<script>alert('Something went wrong');</script>";
                        }
                    }elseif(isset($_GET['delete'])){
                        $id = $_GET['delete'];
                        $query = "DELETE FROM list_contact WHERE id = '$id' ";
                        $deleted_row = $database->delete($query);
                        if($deleted_row){
                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Mail deleted successfully !</div>";
                        }else{
                            echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Mail not deleted !</div>";
                        }
                    }
                    ?>
                    <table width="100%" class="table table-striped table-bordered table-hover comments" id="dataTables-contact">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mail</th>
                            <th>Received</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM list_contact WHERE status = '0' ORDER BY id DESC";
                        $mail = $database->select($query);
                        if($mail){
                            while($result = $mail->fetch_assoc()){
                                ?>
                                <tr class="odd gradeX">
                                    <td width="15%"><?php echo $result['name']; ?></td>
                                    <td class="mail-caption"  width="68%">
                                        <div class="mail-message">
                                            <?php echo $result['subject'].' - '.$format->textShorten($result['description'], 100); ?>
                                        </div>
                                        <div class="mail-icon-overlay">
                                            <span class="single-icon"><a onclick="return confirm('Are you sure to delete?')" href="?delete=<?php echo $result['id']; ?>"><abbr title="Delete"><i class="fa fa-trash  fa-fw"></i></abbr></a></span>
                                            <span class="single-icon"><a onclick="return confirm('Are you sure to restore?')" href="?restore=<?php echo $result['id']; ?>"><abbr title="Restore"><i class="fa fa-undo  fa-fw"></i></abbr></a></span>
                                        </div>
                                    </td>
                                    <td width="17%"><?php echo $format->formatDate($result['created_at']); ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-contact').DataTable({
            responsive: true
        });
    });
</script>
