<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
if(isset($_GET['editmain'])){
    $id = $_GET['editmain'];
}elseif(isset($_GET['editfooter'])){
    $ids = $_GET['editfooter'];
}else{
    echo "<script type='text/javascript'> window.location ='menu.php'; </script>";
    //header("Location: menu.php");
}
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customize</h1>
            </div>
            <!-- /.col-lg-12 -->
            <!--            customize content starts here-->
            <div id="menu-panel">
                <div class="col-lg-3">
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
                                                ?>
                                                <li>
                                                    <a href="<?php echo $result['link']; ?>" target="_blank"> <?php echo $result['title']; ?></a> <a href="editmenu.php?editmain=<?php echo $result['id']; ?>"><i class="fa fa-edit fa-fw"></i></a>
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

                <div class="col-lg-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Edit Menu
                        </div>
                        <div class="panel-body">
                            <?php
                            if(isset($_GET['editmain'])){
                                if(isset($_POST["menu"])){
                                    $title = $format->validation($_POST['title']);
                                    $link = $format->validation($_POST['link']);
                                    $title = mysqli_real_escape_string($database->link, $title);
                                    $link = mysqli_real_escape_string($database->link, $link);
                                    if($title == "" || $link == "" ){
                                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                    }else{
                                        $query = "UPDATE list_mainmenu
                                                SET 
                                                title = '$title',
                                                link = '$link'
                                                WHERE
                                                id = '$id' ";
                                        $updated_row = $database->update($query);
                                        if($updated_row){
                                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu updated successfully ! <a href='menu.php'>Back</a> </div>";
                                        }else{
                                            echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu not updated !</div>";
                                        }
                                    }
                                }
                            }elseif(isset($_GET['editfooter'])){
                                if(isset($_POST["menu"])){
                                    $title = $format->validation($_POST['title']);
                                    $link = $format->validation($_POST['link']);
                                    $title = mysqli_real_escape_string($database->link, $title);
                                    $link = mysqli_real_escape_string($database->link, $link);
                                    if($title == "" || $link == "" ){
                                        echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Field must not be empty !</div>";
                                    }else{
                                        $query = "UPDATE list_footermenu
                                                SET 
                                                title = '$title',
                                                link = '$link'
                                                WHERE
                                                id = '$ids' ";
                                        $updated_row = $database->update($query);
                                        if($updated_row){
                                            echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu updated successfully ! <a href='menu.php'>Back</a> </div>";
                                        }else{
                                            echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Menu not updated !</div>";
                                        }
                                    }
                                }
                            }
                            ?>
                            <form class="menu-form" action="" method="post">
                                <?php
                                if(isset($_GET['editmain'])){
                                    $query = "SELECT * FROM list_mainmenu WHERE id = '$id' ";
                                }elseif(isset($_GET['editfooter'])){
                                    $query = "SELECT * FROM list_footermenu WHERE id = '$ids' ";
                                }
                                $menu = $database->select($query);
                                if($menu){
                                    while($result = $menu->fetch_assoc()){
                                        ?>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="title" class="form-control" id="inputPassword2" value="<?php echo $result['title']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="link" class="form-control" id="inputPassword2" value="<?php echo $result['link']; ?>">
                                        </div>
                                        <input type="submit" class="btn btn-success mb-2" name="menu" value="Update">
                                        <?php
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Header Menu
                    </div>
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
