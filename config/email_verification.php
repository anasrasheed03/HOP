<?php
include('db.php');
if(!empty($_GET['code']) && isset($_GET['code']))
{
	$code=$_GET['code'];


  $sql="SELECT * FROM tbl_login WHERE activationcode='$code'";
  $result = mysqli_query($mysqli,$sql);
  $num = mysqli_num_rows($result);
if($num>0)
  {
  
  $st=0;
  $result ="SELECT id FROM tbl_login WHERE activationcode='$code' and status='$st'";
  $result2 = mysqli_query($mysqli,$result);
  $result4 = mysqli_num_rows($result2); 
 
if($result4>0) 
  {

    $st=1;
    $result1=$mysqli->query("UPDATE tbl_login SET status='$st' WHERE activationcode='$code'");
    $msg="Your account is successfully activated"; 
    }
    else
    {
  $msg ="Your account is already active, no need to activate again";
    }
    }
    else
    {
  $msg ="Wrong activation code.";
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>HOPV - Email Verification System</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
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
       
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" action="../index.php">                                
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <h2>EMAIL Verified Successfully!</h2>
                                        <button class="btn btn-block btn-lg btn-info" type="submit">LOGIN</button>
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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    
</body>

</html>