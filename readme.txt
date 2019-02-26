$query = "SELECT * FROM list_user WHERE email = '$email' AND password = '$password' ";
                                $result = $database->select($query);
                                if($result != false){
                                    $value = $result->fetch_assoc();
                                    session::set("login", true);
                                    session::set("userName", $value['username']);
                                    session::set("userId", $value['id']);
                                    session::set("userRole", $value['role']);
                                    header("Location: index.php");
                                }else{
                                    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Incorrect email and password !!</div>";
                                }