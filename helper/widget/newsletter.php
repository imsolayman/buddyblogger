<?php
if(isset($_POST["subscribe-now"])){
    $email = $format->validation($_POST["email"]);
    $email = mysqli_real_escape_string($database->link, $email);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Invalid email address ! Please enter a valid email');</script>";
    }else {
        $query = "INSERT INTO list_subscribe (email) VALUES ('$email') ";
        $insert_row = $database->insert($query);
        if ($insert_row) {
            echo "<script>alert('Thanks for your subscription');</script>";
        } else {
            echo "<script>alert('Sorry ! Mail is not subscribed');</script>";
        }
    }
}
?>
<!--            widget here-->

<div class="subscribe-now">
    <h6 class="text-white">Newsletter</h6>
    <p> <i class="fa fa-envelope"></i> Subscribe for our daily news</p>
    <div class="form-holder">
        <form action="" method="post">
            <div class="form-group">
                <input name="email" id="email" placeholder="Type your email address" type="text"> <!--type will be email-->
                <button type="submit" name="subscribe-now"  name="subscribe" class="submit">Subscribe</button>
            </div>
        </form>
    </div>
</div>