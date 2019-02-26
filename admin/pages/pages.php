<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(Session::get('userRole') != '1'){
    echo "<script type='text/javascript'> window.location ='index.php'; </script>";
}
?>
<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM list_pages WHERE id = '$id' ";
    $deleted_row = $database->delete($query);
    if($deleted_row){
        echo "<script>alert('Post deleted successfully');</script>";
    }else{
        echo "<script>alert('Something went wrong !');</script>";
    }
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Pages</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Recent Posts
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-subscribe">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT *  FROM list_pages ORDER BY id DESC";
                        $pages = $database->select($query);
                        if($pages){
                            $i = 0;
                            while($result = $pages->fetch_assoc()){
                                $i++
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $i; ?></td>
                                    <td  class="center"><a href="editpage.php?edit=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></td>
                                    <td><?php echo $format->formatDate($result['created_at']); ?></td>
                                    <td  class="center"><a href="<?php echo SITE_URL; ?>./page/<?php echo $result['slug']; ?>" target="_blank"> <i class="fa fa-eye fa-fw"></i> </a> <a href="editpage.php?edit=<?php echo $result['id']; ?>"><i class="fa fa-edit  fa-fw"></i></a>  <a onclick="return confirm('Are you sure?')" href="?delete=<?php echo $result['id']; ?>"><i class="fa fa-trash  fa-fw"></i></a>  </td>
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
