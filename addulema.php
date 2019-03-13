<?php
session_start();

include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

?>

<?php 
if(isset($_POST['submit'])){
    
 $ulema_name=$_POST['ulema_name'];
 $ulema_email=$_POST['ulema_email'];
 $designation=$_POST['designation'];
 $address=$_POST['address'];
 $activationcode=md5($email.time());
 $certification_authority=$_POST['certification_authority'];
 $ulema_contact=$_POST['ulema_contact'];
 

            $query="INSERT INTO `ulema`(ulema_name,ulema_email,designation,address,certification_authority,ulema_contact,ulkey) ";
            $query.="VALUES('$ulema_name','$ulema_email','$designation','$address','$certification_authority','$ulema_contact','$activationcode')";
            
            if ($mysqli->query($query) == TRUE) {

           $to=$ulema_email;
            $msg= "Thanks for new Registration.";   
            $subject="Email Verification";
            $headers .= "MIME-Version: 1.0"."\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                    $headers .= 'From:Halal o Product Verifier <contact@halaloproduct.pk>'."\r\n";
                    
            $ms.="<html></body><div><div>Dear $ulema_name,</div></br></br>";
            $ms.="<div style='padding-top:8px;'>Your account information is successfully created in our portal, Please click the following link For verifying and activate your account.</div>
            <div style='padding-top:10px;'><a href='https://www.maknam.com/Portal2/register.php?ref=$activationcode&&tor=ul'>Click Here</a></div>
            <div style='padding-top:4px;'> powered by <a href='halaloproduct.pk'>Halaloproduct.pk</a></div></div>
            </body></html>";
            mail($to,$subject,$ms,$headers);
                            echo "<script>alert('Ulema has been added to the Database.');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";
            }
                else
                {
                    echo "Data not inserted'.mysqli_error($query)";
                }
                                                        
    
    
       


}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>Admin Portal - Halal o Produvt Verifier</title>
    <!-- Custom CSS -->
    <link href="../../Portal2/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../Portal2/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../../Portal2/assets/libs/morris.js/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../Portal2/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        
         <?php 

                include ("config/header.php");

            ?>
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php 

                include ("config/menu.php");

            ?>

       
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
   
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Add Ulema</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Ulema</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Ulema</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
               <!-- Start Page Content -->
                      <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                     <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" aligh="center">Ulema</h4>
                                <h6 class="card-subtitle">Please add the Ulema Details which are required below.</h6>
                            </div>
                            <hr>
                            
                                            
                            <form class="form-horizontal"  method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ename" placeholder="Enter Ulema Name" name="ulema_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pname" placeholder="Enter the Designation of the Ulema in the Certification Authority" name="designation">
                                        </div>
                                    </div>
                                     
                                     <?php 
                         $uid=$_SESSION['uid'];
                         
                         $disply_info="SELECT * FROM tbl_login WHERE id=$uid";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  }
                                        
                                                    $key=$check['refkey'];
                                                    
                                                    $disply_br="SELECT * FROM certification_authorities WHERE crkey='$key'";

                                                                if ($check_result2=mysqli_query($mysqli,$disply_br))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check2=mysqli_fetch_assoc($check_result2);
                                                                  }
                                                    
                                    if($check2['crkey']!="" || $_SESSION['useraccess']==1){
                                    
                         
                         ?>
                                     
                                     <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Affiliation</label>
                                        <div class="col-sm-9">
                                            <?php 
                                            if($check2['certification_authority']=='' && $_SESSION['useraccess']==1){
                                            ?>
                                            <input type="text" class="form-control" id="ename" name="certification_authority" placeholder="Enter the Certification Authority Name">
                                            <?php 
                                            }else{
                                                ?>
                                            <input type="text" class="form-control" id="ename" name="certification_authority" readonly value="<?php echo $check2['certification_authority']; ?>" placeholder="Enter the Certification Authority Name">    
                                            <?php 
                                                
                                            } }
                                            ?>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the contact phone number of the Ulema" name="ulema_contact">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the contact email" name="ulema_email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the your physical address" name="address">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right row align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" aligh="center" name="submit">Add Ulema</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
           
                <!-- End Row -->
                <!-- Row -->
                <!-- End Row -->
                <!-- Row -->
               <!-- End Row -->
                <!-- Row -->
                <!-- End Row -->
                <!-- Row -->
                <!-- End Row -->
                <!-- Row -->
                <!-- End Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
          <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
             <?php
           include ("config/footer.php");
           ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../Portal2/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../Portal2/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../Portal2/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../../Portal2/dist/js/app.min.js"></script>
    <script src="../../Portal2/dist/js/app.init.horizontal.js"></script>
    <script src="../../Portal2/dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../Portal2/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../Portal2/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../Portal2/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../Portal2/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../Portal2/dist/js/custom.min.js"></script>
</body>

</html>