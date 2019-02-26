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
                <h1 class="page-header">Manu Options</h1>
            </div>
            <!-- /.col-lg-12 -->
            <!--            customize content starts here-->
            <div id="menu-panel">
                <div class="col-lg-3 pages-list">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Pages
                            </div>
                            <div class="panel-body">
                                <div class="navbar-default">
                                    <div class="sidebar-nav">
                                        <?php
                                        if(isset($_GET['addpage'])){
                                            $id = $_GET['addpage'];
                                            $getquery = "SELECT * FROM list_pages  WHERE id = '$id' ";
                                            $getpage = $database->select($getquery);
                                            $getresult = $getpage->fetch_assoc();
                                            $title = $getresult['title'];
                                            $link = $getresult['slug'];
                                            if($title == "" OR $link == ""){
                                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                            }else{
                                                $query = "INSERT INTO list_mainmenu (title, link) VALUES ('$title', '$link')";
                                                $inserted_row = $database->insert($query);
                                                if($inserted_row){
                                                    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu Added Successfully !</div>";
                                                }else{
                                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Something Went Wrong !</div>";
                                                }
                                            }
                                        }
                                        ?>
                                        <ul class="nav menu-list" id="side-menu">
                                            <?php
                                            $query = "SELECT * FROM list_pages  ORDER BY id ASC";
                                            $menu = $database->select($query);
                                            if($menu){
                                            while($result = $menu->fetch_assoc()){
                                            ?>
                                                    <li>

                                                        <a onclick="return confirm('Are you sure?')" href="?addpage=<?php echo $result['id']; ?>"><?php echo $result['title']; ?><i class="fa fa-plus fa-fw"></i></a>
                                                    </li>
                                            <?php
                                                }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="panel-body seo-meta-panel">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Categories</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="navbar-default">
                                                <div class="sidebar-nav">
                                                    <?php
                                                    if(isset($_GET['addcat'])){
                                                        $id = $_GET['addcat'];
                                                        $getquery = "SELECT * FROM list_category  WHERE id = '$id' ";
                                                        $getpage = $database->select($getquery);
                                                        $getresult = $getpage->fetch_assoc();
                                                        $title = $getresult['name'];
                                                        $link = $getresult['slug'];
                                                        if($title == "" OR $link == ""){
                                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                                        }else{
                                                            $query = "INSERT INTO list_mainmenu (title, link) VALUES ('$title', 'categories/$link')";
                                                            $inserted_row = $database->insert($query);
                                                            if($inserted_row){
                                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu Added Successfully !</div>";
                                                            }else{
                                                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Something Went Wrong !</div>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <ul class="nav menu-list" id="side-menu">
                                                        <?php
                                                        $query = "SELECT * FROM list_category  ORDER BY id ASC";
                                                        $menu = $database->select($query);
                                                        if($menu){
                                                        while($result = $menu->fetch_assoc()){
                                                        ?>
                                                                <li>

                                                                    <a onclick="return confirm('Are you sure?')" href="?addcat=<?php echo $result['id']; ?>"><?php echo $result['name']; ?><i class="fa fa-plus fa-fw"></i></a>
                                                                </li>
                                                            <?php
                                                        }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Add New Menu
                        </div>
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Main Menu</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Header Menu</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <?php
                                    if(isset($_POST["mainmenu"])){
                                        $title = $format->validation($_POST['title']);
                                        $link = $format->validation($_POST['link']);
                                        $parent_id = mysqli_real_escape_string($database->link, $_POST['parent']);
                                        $title = mysqli_real_escape_string($database->link, $title);
                                        $link = mysqli_real_escape_string($database->link, $link);
                                        if($title == ""){
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                        }elseif($parent_id == 0){
                                            $query = "INSERT INTO list_mainmenu (title, link) VALUES ('$title', '$link') ";
                                            $inserted_row = $database->update($query);
                                            if($inserted_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu updated successfully !</div>";
                                            }else{
                                                echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu not updated !</div>";
                                            }
                                        }else{
                                            $query = "INSERT INTO list_mainmenu (title, link, parent_id) VALUES ('$title', '$link', '$parent_id') ";
                                            $inserted_row = $database->update($query);
                                            if($inserted_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu updated successfully !</div>";
                                            }else{
                                                echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu not updated !</div>";
                                            }
                                        }
                                    }
                                    ?>
                                    <form class="menu-form" action="" method="post">
                                        <div class="form-group col-md-4">
                                            <input type="text" name="title" class="form-control" id="inputPassword2" placeholder="title">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="link" class="form-control" id="inputPassword2" placeholder="link">
                                        </div>
                                        <div class="form-group col-md-10">
                                            <select class="form-control"  name="parent">
                                                <option value="0" selected>Select Parent Menu</option>
                                                <?php
                                                $query = "SELECT * FROM list_mainmenu ORDER BY id ASC";
                                                $data = $database->select($query);
                                                if($data){
                                                while($result = $data->fetch_assoc()) {
                                                    $id = $result['id'];
                                                    $submenu_id = $result['parent_id'];
                                                    if ($submenu_id == NULL) { ?>
                                                        <option value="<?php echo $result['id']; ?>"><?php echo $result['title']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-primary mb-2" name="mainmenu" value="Add">
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <?php
                                    if(isset($_POST["footermenu"])){
                                        $title = $format->validation($_POST['title']);
                                        $link = $format->validation($_POST['link']);
                                        $title = mysqli_real_escape_string($database->link, $title);
                                        $link = mysqli_real_escape_string($database->link, $link);
                                        if($title == ""){
                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                        }else{
                                            $query = "INSERT INTO list_footermenu (title, link) VALUES ('$title', '$link') ";
                                            $inserted_row = $database->update($query);
                                            if($inserted_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu updated successfully !</div>";
                                            }else{
                                                echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu not updated !</div>";
                                            }
                                        }
                                    }
                                    ?>
                                    <form class="menu-form" action="" method="post">
                                        <div class="form-group col-md-4">
                                            <input type="text" name="title" class="form-control" id="inputPassword2" placeholder="title">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="link" class="form-control" id="inputPassword2" placeholder="link">
                                        </div>
                                        <input type="submit" class="btn btn-primary mb-2" name="footermenu" value="Add">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3 menus-list">

                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Main Menu
                            </div>
                            <div class="panel-body">

                                <div class="navbar-default">
                                    <div class="sidebar-nav">
                                        <?php
                                        if(isset($_GET['deletemain'])){
                                            $id = $_GET['deletemain'];
                                            $query = "DELETE FROM list_mainmenu WHERE id = '$id' ";
                                            $deleted_row = $database->delete($query);
                                            if($deleted_row){
                                                echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu Deleted Successfully !</div>";
                                            }else{
                                                echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Something Went Woring !</div>";
                                            }
                                        }
                                        ?>
                                        <ul class="nav menu-list" id="side-menu">
                                            <?php
                                            $query = "SELECT * FROM list_mainmenu  ORDER BY id ASC";
                                            $menu = $database->select($query);
                                            if($menu){
                                                while($result = $menu->fetch_assoc()){
                                                    $id = $result['id'];
                                                    $submenu_id = $result['parent_id'];
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo $result['link']; ?>" target="_blank"> <?php echo $result['title']; ?></a> <?php if ($submenu_id != NULL) { echo "[sub]"; } ?> <a href="editmenu.php?editmain=<?php echo $result['id']; ?>"><i class="fa fa-edit fa-fw"></i></a>
                                                        <a onclick="return confirm('Are you sure?')" href="?deletemain=<?php echo $result['id']; ?>"><i class="fa fa-trash fa-fw"></i></a>

                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">

                        <div class="panel-body seo-meta-panel">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Header Menu</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="navbar-default">
                                                <div class="sidebar-nav">
                                                    <?php
                                                    if(isset($_GET['deletefooter'])){
                                                        $id = $_GET['deletefooter'];
                                                        $query = "DELETE FROM list_footermenu WHERE id = '$id' ";
                                                        $deleted_row = $database->delete($query);
                                                        if($deleted_row){
                                                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu Deleted Successfully !</div>";
                                                        }else{
                                                            echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Something Went Woring !</div>";
                                                        }
                                                    }
                                                    ?>
                                                    <ul class="nav menu-list" id="side-menu">
                                                        <?php
                                                        $query = "SELECT * FROM list_footermenu ORDER BY id ASC";
                                                        $menu = $database->select($query);
                                                        if($menu){
                                                            while($result = $menu->fetch_assoc()){
                                                                ?>
                                                                <li>
                                                                    <a href="<?php echo $result['link']; ?>" target="_blank"> <?php echo $result['title']; ?></a> <a href="editmenu.php?editfooter=<?php echo $result['id']; ?>"><i class="fa fa-edit fa-fw"></i></a>
                                                                    <a onclick="return confirm('Are you sure?')" href="?deletefooter=<?php echo $result['id']; ?>"><i class="fa fa-trash fa-fw"></i></a>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!--            customize content starts here-->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>
