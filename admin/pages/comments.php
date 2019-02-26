<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Comments</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Recent Comments
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php
                        if(isset($_GET['approved'])){
                            $id = $_GET['approved'];
                            $query = "UPDATE list_comment SET status = '1' WHERE id = '$id' ";
                            $updated_row = $database->update($query);
                            if($updated_row){
                                echo "<script>alert('Comment has been approved !');</script>";
                            }else{
                                echo "<script>alert('Something went wrong');</script>";
                            }
                        }elseif(isset($_GET['unapproved'])){
                            $id = $_GET['unapproved'];
                            $query = "UPDATE list_comment SET status = '0' WHERE id = '$id' ";
                            $updated_row = $database->update($query);
                            if($updated_row){
                                echo "<script>alert('Comment has been unapproved !');</script>";
                            }else{
                                echo "<script>alert('Something went wrong');</script>";
                            }
                        }elseif(isset($_GET['delete'])){
                            $id = $_GET['delete'];
                            $query = "DELETE FROM list_comment WHERE id = '$id' ";
                            $deleted_row = $database->delete($query);
                            if($deleted_row){
                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Comment deleted successfully !</div>";
                            }else{
                                echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Comment not deleted !</div>";
                            }
                        }
                    ?>
                    <table width="100%" class="table table-striped table-bordered table-hover comments" id="dataTables-subscribe">
                        <thead>
                        <tr>
                            <th width="6%">No</th>
                            <th width="8%">IP</th>
                            <th width="10%">Post Id</th>
                            <th width="10%">Name</th>
                            <th width="10%">Email</th>
                            <th width="30%">Comment</th>
                            <th width="10%">Time</th>
                            <th width="8%">Status</th>
                            <th width="8%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM list_comment ORDER BY id DESC";
                            $comment = $database->select($query);
                            if($comment){
                                $i = 0;
                                while($result = $comment->fetch_assoc()){
                                    $i++
                         ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $i; ?></td>
                                    <td  class="center"><?php echo $result['ip']; ?></td>
                                    <td><?php echo $result['post']; ?></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><?php echo $format->textShorten($result['comment'], 100); ?></td>
                                    <td><?php echo $format->humanTiming(strtotime($result['created_at'])); ?></td>
                                    <td>
                                        <a onclick="return confirm('Are you sure to approve?')" href="?approved=<?php echo $result['id']; ?>" class="doneMessage">
                                        <?php
                                            if($result['status'] == 0){
                                                echo "<p class='error'>Unapproved</p>";
                                            }
                                        ?>
                                        </a>
                                        <a onclick="return confirm('Are you sure to unapprove?')" href="?unapproved=<?php echo $result['id']; ?>" class="doneMessage">
                                        <?php
                                            if($result['status'] == 1){
                                                echo "<p class='done'>Approved</p>";
                                            }
                                        ?>
                                        </a>
                                    </td>
                                    <td  class="center"><a href="<?php echo SITE_URL; ?>post.php?id=<?php echo $result['post']; ?>" target="_blank"> <i class="fa fa-eye fa-fw"></i></a>  <a onclick="return confirm('Are you sure?')" href="?delete=<?php echo $result['id']; ?>"><i class="fa fa-trash  fa-fw"></i></a>  </td>
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
        $('#dataTables-subscribe').DataTable({
            responsive: true
        });
        $('#dataTables-newsletter').DataTable({
            responsive: true
        });
    });
</script>
