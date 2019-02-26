<?php include 'inc/header.php'; ?>
        <div class="dh--breadcrumb--area" style="background-image: url(assets/img/breadcrumb-bg.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4>Contact Us</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="st--contact--area sp">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 about--col">
                        <div class="about--content">
                            <div class="about_img">
                                <img src="assets/img/blog--post--1.jpg" alt="">
                            </div>
                            <p>I’m Rosie, a roaming blogger who’s lucky enough to call London home. I fill these pages with my life & adventures. It all started as a way to stay in touch with friends & family but it soon grew and now I have readers who I consider my extended friends & family all over the world.</p>
                        </div>
                        <div class="st--get--touch">
                            <div class="single--touch">
                                <div class="touch--left">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="toucn--righ">
                                    <span>1881 Kuhl Avenue <br>Gainesville, GA 30501</span>
                                </div>
                            </div>
                            <div class="single--touch">
                                <div class="touch--left">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="toucn--righ">
                                    <a href="#">info@stylish.com</a>
                                    <a href="#">contact@stylish.com</a>
                                </div>
                            </div>
                            <div class="single--touch">
                                <div class="touch--left">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="toucn--righ">
                                    <a href="#">+44-678-719-2351</a>
                                    <a href="#">+44-608-711-2055</a>
                                </div>
                            </div>
                        </div>
                        <div class="st--contact">
                            <?php
                            if(isset($_POST['contact'])){
                                $name = $format->validation($_POST['name']);
                                $email = $format->validation($_POST['email']);
                                $subject = $format->validation($_POST['subject']);
                                $description = $format->validation($_POST['description']);
                                $name = mysqli_real_escape_string($database->link, $name);
                                $email = mysqli_real_escape_string($database->link, $email);
                                $subject = mysqli_real_escape_string($database->link, $subject);
                                $description = mysqli_real_escape_string($database->link, $description);
                                if($name == "" || $email == "" || $subject == "" || $description == ""){
                                    echo "<button class='btn btn-danger'>Error ! Field must not be empty</button>";
                                }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                    echo "<button class='btn btn-danger'>Error ! Please enter a valid email address</button>";
                                }else {
                                    $query = "INSERT INTO list_contact (name, email, subject, description) VALUES ('$name', '$email', '$subject', '$description') ";
                                    $insert_row = $database->insert($query);
                                    if ($insert_row) {
                                        echo "<script>alert('Thanks ! Message sent');</script>";
                                    } else {
                                        echo "<button class='btn btn-danger'>Error ! Message not Sent</button>";
                                    }
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="name" placeholder="Your Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" placeholder="Your Email">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="subject" placeholder="Your Subject">
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea name="description" placeholder="Write your message"></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="submit" name="contact" value="Send Message">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1 st--sidebar--column">

                        <?php include 'inc/sidebar.php'; ?>
                        <!-- /.widget -->
                    </div>
                    <!-- /.st-sidebar-column -->
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>
