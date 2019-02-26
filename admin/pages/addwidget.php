<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(Session::get('userRole') != '1'){
    echo "<script type='text/javascript'> window.location ='index.php'; </script>";
}
?>
<?php
if(isset($_GET['name'])){
    $name = $_GET['name'];
}else{
    echo "<script type='text/javascript'> window.location ='widgets.php'; </script>";
    //header("Location: menu.php");
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
                            <a href="addwidget.php?name=category"  class="btn btn-default">
                                Category
                            </a>
                        </div>
                        <div class="single-modals">
                            <a href="addwidget.php?name=footermenu"  class="btn btn-default">
                                Footer Menu
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
                    </div>
                    <div class="col-lg-6">
                        <?php
                        if(isset($_POST["insert"])){
                            $widgetId = $_POST['optionsRadios'];
                            $query = "UPDATE list_widget
                                                SET 
                                                $widgetId = '$name'
                                                WHERE
                                                id = '1' ";
                            $updated_row = $database->update($query);
                            if($updated_row){
                                echo "<script type='text/javascript'>alert('Widget Added Successfully !'); window.location ='widgets.php'; </script>";
                            }else{
                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Something Went Wrong !</div>";
                            }
                        }
                        ?>

                        <div id="WidgetArea">
                            <div class="dialog">
                                <form action="" role="form" method="post">
                                    <div class="form-group">
                                        <label>Radio Buttons</label>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="sidebar1" type="radio">Sidebar 1
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios2" value="sidebar2" type="radio">Sidebar 2
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios3" value="sidebar3" type="radio">Sidebar 3
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios3" value="sidebar4" type="radio">Sidebar 4
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="footer1" type="radio">Footer 1
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios2" value="footer2" type="radio">Footer 2
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios3" value="footer3" type="radio">Footer 3
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Update Options" name="insert">
                                    </div>
                                </form>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
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
