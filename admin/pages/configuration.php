<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Configuration</h1>
                <form action="" method="post" accept-charset="utf-8">
                    <input type="hidden" name="varient_csrf_token" value="1f1d95ef12db0d42ae10a37cba5f8818">
                    <div class="col-lg-8 col-md-8">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Email Settings</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- include message block -->
                                <div class="form-group">
                                    <label class="control-label">Mail Protocol</label>

                                    <select name="mail_protocol" class="form-control">
                                        <option value="smtp" selected="">SMTP</option>
                                        <option value="mail">Mail</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Mail Title</label>
                                    <input type="text" class="form-control" name="mail_title" placeholder="Mail Title" value="Varient">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Mail Host</label>
                                    <input type="text" class="form-control" name="mail_host" placeholder="Mail Host" value="smtp.gmail.com">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Mail Port</label>
                                    <input type="text" class="form-control" name="mail_port" placeholder="Mail Port" value="587">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Mail Username</label>
                                    <input type="text" class="form-control" name="mail_username" placeholder="Mail Username" value="mail.codingest@gmail.com">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Mail Password</label>
                                    <input type="password" class="form-control" name="mail_password" placeholder="Mail Password" value="**********">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="submit" value="email" class="btn btn-primary pull-right">Save Changes</button>
                            </div>
                            <!-- /.box-footer -->
                    </div>
                </form>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include '../inc/footer.php'; ?>
