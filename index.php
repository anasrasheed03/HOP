<?php 
     
    date_default_timezone_set("Asia/Karachi");
    $dbhost = 'localhost';
    $dbuser = 'maknam_anas';
    $dbpass = 'Racespeed@#!@';
    $dbname = 'maknam_halal_product';

    //Connect
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if (mysqli_connect_errno()) {
        printf("MySQLi connection failed: ", mysqli_connect_error());
        exit();
    }

    // Change character set to utf8
    if (!$mysqli->set_charset('utf8')) {
        printf('Error loading character set utf8: %s\n', $mysqli>error);
    }

if(isset($_POST['reset'])){
                                         $email = stripslashes($_POST['email']);
                                            //escapes special characters in a string
                                        $email = mysqli_real_escape_string($mysqli,$email);
                                        $password="asldl2q23o2313askasdkdas023";
                                         $password=str_shuffle($password);
                                         $pasw=substr($password,0,8);
                                        $query1 = "Update tbl_login SET password=$pasw,profile_update=0 where email='$email'";
                                        if ($mysqli->query($query1) == TRUE) {

            $to=$email;
            $msg= "Password RESET.";   
            $subject="Email Verification";
            $headers .= "MIME-Version: 1.0"."\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                    $headers .= 'From:Halal o Product Verifier <contact@halaloproduct.pk>'."\r\n";
                    
            $ms.="<html></body><div><div>Dear,</div></br></br>";
            $ms.="<div style='padding-top:8px;'>Your account password is successfully reset,</div>
            <div style='padding-top:10px;'>New password is $pasw </div>
            <div style='padding-top:4px;'> powered by <a href='halaloproduct.pk'>Halaloproduct.pk</a></div></div>
            </body></html>";
            mail($to,$subject,$ms,$headers);
                            echo "<script>alert('Update Successfully, please Check your account in the registered Email-Id');</script>";
                             echo "<script>window.location = 'index.php';</script>";;
                }
            
}
elseif (isset($_POST['submit'])){
                                            // removes backslashes
                                         $username = stripslashes($_REQUEST['uname']);
                                            //escapes special characters in a string
                                        $username = mysqli_real_escape_string($mysqli,$username);
                                        $password = stripslashes($_REQUEST['upass']);
                                        $password = mysqli_real_escape_string($mysqli,$password);
                                        
                                        
                                        //Checking is user existing in the database or not

                                        $query = "SELECT * FROM tbl_login where loginid='$username'";
                                        $result = mysqli_query($mysqli,$query);
                                        $rows = mysqli_num_rows($result);
                                        if($rows==1){

                                        while($row = $result->fetch_assoc()) {
                                            $setemail = $row['email'];
                                            $setpictures = $row['pictures'];
                                            $setrole = $row['role'];
                                            $uid = $row['id'];
                                            $profile_update = $row['profile_update'];
                                            $phone_number = $row['phone_number'];
                                            

                                        }
                                        
                                        if($profile_update==1){
                                            session_start();
                                            $_SESSION['uid']=$uid;
                                            $_SESSION['setemail']=$setemail;
                                            $_SESSION['username']=$username;
                                            $_SESSION['refkey']=$refkey;
                                            $_SESSION['password']=$password;
                                            $_SESSION['setpictures']=$setpictures;
                                            $_SESSION["useraccess"]=$setrole;
                                            $_SESSION["phone_number"]=$phone_number;

                                        header("Location: dashboard.php");
                                            // Redirect user to index.php
                                        }else{
                                          session_start();
                                            $_SESSION['uid']=$uid;
                                            $_SESSION['setemail']=$setemail;
                                            $_SESSION['username']=$username;
                                            $_SESSION['password']=$password;
                                            $_SESSION['setpictures']=$setpictures;
                                            $_SESSION["useraccess"]=$setrole;
                                            $_SESSION["phone_number"]=$phone_number;
                                            $_SESSION['refkey']=$refkey;
                                        header("Location: profile.php");  
                                            
                                        }
                                        
                                        
                                    }


                                        else{
                                        echo "<div class='form'>
                                    <h3>Username/password is incorrect.</h3>
                                    <br/>Click here to <a href='index.php'>Login</a></div>";
                                        }
                                        }else{



?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Login - Halal o Product Verifier</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(/portal2/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="../../Portal2/assets/images/logo-icon.png" alt="logo" width="45" height="45" /></span>
                        <span class="db"><h3>Halal o Prodct Verifier Login System</h3></span>
                        <h5 class="font-medium m-b-20">Sign In</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            
                            <form class="form-horizontal m-t-20"  method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" id="username" name="uname" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                
                                    <div id="msg" class=""></div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="upass" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i class="fa fa-lock m-r-5"></i> Forgot password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit" value="login" id="submit" name="submit" >Log In</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10">
                                    <div class="col-sm-12 text-center">
                                        Don't have an account? <a href="register.php" class="text-info m-l-5"><b>Sign Up</b></a>
                                    </div>
                                </div>
                            </form>
                            <?php
                
                             }

                              ?>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <span class="db">Halal o Product Verifier </span>
                        <h5 class="font-medium m-b-20">Recover Password</h5>
                        <span>Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" method="POST">
                            <!-- email -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="Enter Email">
                                </div>
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-danger" type="submit" name="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#username").blur(function(e) {
            var uname = $(this).val();
            if (uname == "")
            {
                $("#msg").html("");
                $("#submit").attr("disabled", true);
            }
            else
            {
                $("#msg").html("checking...");
                $.ajax({
                    url: "config/validateauth.php",
                    data: {username: uname},
                    type: "POST",
                    success: function(data) {
                        if(data > '0') {
                            $("#msg").html('<span class="text-danger">Email not verified yet!</span>');
                            $("#submit").attr("disabled", true);
                        } else {
                            $("#msg").html('');
                            $("#submit").attr("disabled", false);
                        }
                    }
                });
            }
        });
    });
    </script>
</body>

</html>