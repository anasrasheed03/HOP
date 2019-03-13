<?php

include('config/db.php');
$fetchrole=$_GET['tor'];


if (isset($_POST['submit'])) {
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $pasw=$_POST['pasw'];
    
    $activationcode=md5($email.time());
    $usr_cover_name = $_FILES['usavatar']['name'];
        if ($usr_cover_name!="") {
                                                    
            $usr_avatar_type = $_FILES['usavatar']['type'];
            $usr_avatar_size = $_FILES['usavatar']['size'];
            $usr_avatar_tmp_name = $_FILES['usavatar']['tmp_name'];
            move_uploaded_file($usr_avatar_tmp_name, "img/$usr_cover_name");
        if(isset($fetchrole)){
            $refkey=$_GET['ref'];
            if ($fetchrole=='br') {
                $frrole=2;
            }elseif ($fetchrole=='cr') {
                $frrole=3;
            }elseif ($fetchrole=='ul') {
                $frrole=4;
            }
            $veh_query = "INSERT INTO `tbl_login`(loginid,email,password,pictures,activationcode,refkey,role) VALUES('$uname','$email','$pasw','$usr_cover_name','$activationcode','$refkey',$frrole)";
             
        }else{
            $veh_query = "INSERT INTO `tbl_login`(loginid,email,password,pictures,activationcode)";
             $veh_query.="VALUES('$uname','$email','$pasw','$usr_cover_name','$activationcode')";
        }
            if ($mysqli->query($veh_query) == TRUE) {

            $to=$email;
            $msg= "Thanks for new Registration.";   
            $subject="Email Verification";
            $headers .= "MIME-Version: 1.0"."\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                    $headers .= 'From:Halal o Product Verifier <contact@halaloproduct.pk>'."\r\n";
                    
            $ms.="<html></body><div><div>Dear $uname,</div></br></br>";
            $ms.="<div style='padding-top:8px;'>Your account information is successfully created in our portal, Please click the following link For verifying and activate your account.</div>
            <div style='padding-top:10px;'><a href='https://maknam.com/Portal2/config/email_verification.php?code=$activationcode'>Click Here</a></div>
            <div style='padding-top:4px;'> powered by <a href='halaloproduct.pk'>Halaloproduct.pk</a></div></div>
            </body></html>";
            mail($to,$subject,$ms,$headers);
                            echo "<script>alert('Registration successful, please verify your account in the registered Email-Id');</script>";
                             echo "<script>window.location = 'index.php';</script>";;
                }
                else
                {
                    echo "Data not inserted'.mysqli_error($veh_query)";
                }
                                                        
        }
        else{

            echo "Please Select image";
        }
    
    
       


}
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
    <title>Halal o Product Registration System</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
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
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(Portal2/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div>
                    <div class="logo">
                        <span class="db"><img src="../../Portal2/assets/images/logo-icon.png" alt="logo" width="45" height="45" /></span>
                        <span class="db"><h3>Halal o Product User Registeration System</h3></span>
                        <h5 class="font-medium m-b-20">Sign Up</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" method="POST"  enctype="multipart/form-data">
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name="uname" id="username" type="text" required=" " placeholder="Username">
                                        <div id="msg" class=""></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" id="usermail" name="email" type="text" required=" " placeholder="Email">
                                        <div id="msg1" class=""></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" name="pasw" type="password" required=" " placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <img id="blah"  src="assets\images\avatar.png" height="200px" width="200px" alt="your image" />
                                        <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" onchange="readURL(this);" class="custom-file-input" name="usavatar" id="inputGroupFile04">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 ">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-lg btn-info " id="submit" name="submit" type="submit ">SIGN UP</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center ">
                                        Already have an account? <a href="index.php" class="text-info m-l-5 "><b>Sign In</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
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
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>
    <script type="text/javascript">
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
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
                    url: "config/validate.php",
                    data: {username: uname},
                    type: "POST",
                    success: function(data) {
                        if(data > '0') {
                            $("#msg").html('<span class="text-danger">Username Already Registered!</span>');
                            $("#submit").attr("disabled", true);
                        } else {
                            $("#msg").html('<span class="text-success">Username available!</span>');
                            $("#submit").attr("disabled", false);
                        }
                    }
                });
            }
        });
        $("#usermail").blur(function(e) {
            var uname = $(this).val();
            if (uname == "")
            {
                $("#msg1").html("");
                $("#submit").attr("disabled", true);
            }
            else
            {
                $("#msg1").html("checking...");
                $.ajax({
                    url: "config/validateemail.php",
                    data: {username: uname},
                    type: "POST",
                    success: function(data) {
                        if(data > '0') {
                            $("#msg1").html('<span class="text-danger">Email Already Registered!</span>');
                            $("#submit").attr("disabled", true);
                        } else {
                            $("#msg1").html('');
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