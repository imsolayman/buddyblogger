<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                        $query = "SELECT * FROM list_comment";
                                        $comments = $database->select($query);
                                        if($comments){
                                            $count = mysqli_num_rows($comments);
                                            echo $count;
                                        }
                                        ?>
                                    </div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-newspaper-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            $query = "SELECT * FROM list_posts";
                                            $comments = $database->select($query);
                                            if($comments){
                                                $count = mysqli_num_rows($comments);
                                                echo $count;
                                            }
                                        ?>
                                    </div>
                                    <div>New Posts!</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bookmark fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            $query = "SELECT * FROM list_subscribe";
                                            $comments = $database->select($query);
                                            if($comments){
                                                $count = mysqli_num_rows($comments);
                                                echo $count;
                                            }
                                        ?>
                                    </div>
                                    <div>New Subscribers!</div>
                                </div>
                            </div>
                        </div>
                        <a href="newsletter.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            $query = "SELECT * FROM list_contact";
                                            $comments = $database->select($query);
                                            if($comments){
                                                $count = mysqli_num_rows($comments);
                                                echo $count;
                                            }
                                        ?>
                                    </div>
                                    <div>New Emails!</div>
                                </div>
                            </div>
                        </div>
                        <a href="inbox.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Latest Posts
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-subscribe">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT list_posts.id, title, description, image, list_posts.created_at, list_posts.category, list_posts.slug, name, firstname, lastname, username  FROM list_posts, list_category, list_user WHERE list_category.id = list_posts.category AND list_user.id = list_posts.author ORDER BY list_posts.id DESC";
                                $posts = $database->select($query);
                                if($posts){
                                    $i = 0;
                                    while($result = $posts->fetch_assoc()){
                                        $i++
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td  class="center"><a href="<?php echo SITE_URL; ?>./<?php echo $result['slug']; ?>" target="_blank"><?php echo $result['title']; ?></a></td>
                                            <td><?php echo $format->formatYear($result['created_at']); ?></td>

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->


                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Subscribers Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="example">
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT * FROM list_subscribe WHERE status = '1'  ORDER BY id DESC";
                                $menu = $database->select($query);
                                if($menu){
                                    $i = 0;
                                    while($result = $menu->fetch_assoc()){
                                        $i++
                                        ?>
                                        <tr class="odd gradeX">
                                            <td  class="center"><?php echo $result['email']; ?></td>
                                            <td><?php echo $format->humanTiming(strtotime($result['created_at'])); ?></td>

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
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#dataTables-subscribe').DataTable({
            responsive: true
        });
        $('#example').DataTable({
            responsive: true
        });
    });
</script>