<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM list_posts WHERE id = '$id' ";
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
            <h1 class="page-header">All Posts</h1>
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
                            <th>Category</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT list_posts.id, title, description, image, list_posts.created_at, list_posts.category, list_posts.slug, author, name, firstname, lastname, username  FROM list_posts, list_category, list_user WHERE list_category.id = list_posts.category AND list_user.id = list_posts.author ORDER BY list_posts.id DESC";
                            $posts = $database->select($query);
                            if($posts){
                            $i = 0;
                            while($result = $posts->fetch_assoc()){
                            $i++
                         ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $i; ?></td>
                                    <td  class="center"><a href="editpost.php?edit=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></td>
                                    <td  class="text-capitalize"><?php echo $result['name']; ?></td>
                                    <td  class="center"><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                    <td><?php echo $format->formatDate($result['created_at']); ?></td>
                                    <td  class="center">
                                        <a href="<?php echo SITE_URL; ?>./<?php echo $result['slug']; ?>" target="_blank"> <i class="fa fa-eye fa-fw"></i> </a>

                                <?php if(Session::get('userId') == $result['author'] || Session::get('userRole') == '1'){ ?>
                                        <a href="editpost.php?edit=<?php echo $result['id']; ?>"><i class="fa fa-edit  fa-fw"></i></a>  <a onclick="return confirm('Are you sure?')" href="?delete=<?php echo $result['id']; ?>"><i class="fa fa-trash  fa-fw"></i></a>
                                    <?php } ?>
                                    </td>
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
