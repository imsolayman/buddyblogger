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
                <h1 class="page-header">Widgets</h1>
            </div>
            <!-- /.col-lg-12 -->
            <!--            customize content starts here-->
            <!--            customize content starts here-->
            <div id="widget-box-panel">
                <div class="col-lg-4 box-panel">
                    <h2>Available Items</h2>
                    <div class="col-lg-6">
                        <div class="single-modals">
                            <a href="addwidget.php?name=contactinfo"  class="btn btn-default">
                                Contact Info
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=searchbox"  class="btn btn-default">
                                Search Box
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=newsletter"  class="btn btn-default">
                                Newsletter
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=tags"  class="btn btn-default">
                                Tags
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=trendingposts"  class="btn btn-default">
                                Trending Posts
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=adsbox"  class="btn btn-default">
                                Ads Box
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-modals">
                            <a href="addwidget.php?name=category"  class="btn btn-default">
                                Category
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=headermenu"  class="btn btn-default">
                                Header Menu
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=socialicon"  class="btn btn-default">
                                Social Icons
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=recentpost"  class="btn btn-default">
                                Recent Posts
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=socialbox"  class="btn btn-default">
                                Social Box
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=twitterfeed"  class="btn btn-default">
                                Twitter Feed
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                if(isset($_GET['delete'])){
                    $id = $_GET['delete'];
                    $query = "UPDATE list_widget
                                SET 
                                $id = ''
                                WHERE
                                id = '1' ";
                    $updated_row = $database->update($query);
                    if($updated_row){
                        echo "<script>alert('Widget Deleted Successfully !');</script>";
                    }else{
                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Something Went Wrong !</div>";
                    }
                }
                ?>
                <?php
                $query = "SELECT * FROM list_widget WHERE id = '1'";
                $widget = $database->select($query);
                if($widget){
                    while($result = $widget->fetch_assoc()){
                        ?>

                        <div class="col-lg-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Sidebar Widgets
                                </div>
                                <div class="panel-body">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Sidebar1">Sidebar1</a>
                                            </h4>
                                        </div>
                                        <div id="Sidebar1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals">
                                                    <a class="btn btn-default">
                                                        <?php if($result['sidebar1'] != ""){echo ucfirst($result['sidebar1'])."<a href='?delete=sidebar1'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Sidebar2">Sidebar 2</a>
                                            </h4>
                                        </div>
                                        <div id="Sidebar2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals">
                                                    <a class="btn btn-default">
                                                        <?php if($result['sidebar2'] != ""){echo ucfirst($result['sidebar2'])."<a href='?delete=sidebar2'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Sidebar3">Sidebar 3</a>
                                            </h4>
                                        </div>
                                        <div id="Sidebar3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['sidebar3'] != ""){echo ucfirst($result['sidebar3'])."<a href='?delete=sidebar3'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Sidebar4">Sidebar 4</a>
                                            </h4>
                                        </div>
                                        <div id="Sidebar4" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['sidebar4'] != ""){echo ucfirst($result['sidebar4'])."<a href='?delete=sidebar4'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Sidebar5">Sidebar 5</a>
                                            </h4>
                                        </div>
                                        <div id="Sidebar5" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['sidebar5'] != ""){echo ucfirst($result['sidebar5'])."<a href='?delete=sidebar5'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Sidebar6">Sidebar 6</a>
                                            </h4>
                                        </div>
                                        <div id="Sidebar6" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['sidebar6'] != ""){echo ucfirst($result['sidebar6'])."<a href='?delete=sidebar6'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Sidebar7">Sidebar 7</a>
                                            </h4>
                                        </div>
                                        <div id="Sidebar7" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['sidebar7'] != ""){echo ucfirst($result['sidebar7'])."<a href='?delete=sidebar7'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Footer Widgets
                                </div>
                                <div class="panel-body">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Footer1">Footer 1</a>
                                            </h4>
                                        </div>
                                        <div id="Footer1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['footer1'] != ""){echo ucfirst($result['footer1'])."<a href='?delete=footer1'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Footer2">Footer 2</a>
                                            </h4>
                                        </div>
                                        <div id="Footer2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['footer2'] != ""){echo ucfirst($result['footer2'])."<a href='?delete=footer2'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Footer3">Footer 3</a>
                                            </h4>
                                        </div>
                                        <div id="Footer3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['footer3'] != ""){echo ucfirst($result['footer3'])."<a href='?delete=footer3'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Header Widgets
                                </div>
                                <div class="panel-body">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Header1">Header 1</a>
                                            </h4>
                                        </div>
                                        <div id="Header1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['header1'] != ""){echo ucfirst($result['header1'])."<a href='?delete=header1'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#Header2">Header 2</a>
                                            </h4>
                                        </div>
                                        <div id="Header2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="single-modals"><a class="btn btn-default">
                                                        <?php if($result['header2'] != ""){echo ucfirst($result['header2'])."<a href='?delete=header2'>Delete</a>"; }else{ echo "<div class='alert alert-warning alert-dismissable'>No Widget Selected !</div>"; } ?>
                                                    </a></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>
                <!-- /.col-lg-4 -->

                <!-- /.col-lg-4 -->
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
