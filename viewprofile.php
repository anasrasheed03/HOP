<?php
session_start();

include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

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
                        <h4 class="page-title">Profile</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">User</li>
                                    <li class="breadcrumb-item active" aria-current="page">View Profile</li>
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
             <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <form class="form-horizontal">
                                <div class="form-body">
                                    <div class="card-body">
                                        <h4 class="card-title">Person Info</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php 
                                            $uid=$_SESSION['uid'];
                                            $disply_info="SELECT * FROM tbl_login WHERE id=$uid";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  }
                                        
                                                    $key=$check['refkey'];                                        
                                            ?>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Loginid:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check['loginid'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Email:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check['email'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <!--/row-->
                                                        
                                        <!--/row-->
                                        
                                    </div>
                                    <?php
                                    if($_SESSION['useraccess']==3 && $_SESSION['useraccess']==1){
                                        
                                        $disply_ca="SELECT * FROM certification_authorities WHERE crkey='$key'";

                                                                if ($check_result2=mysqli_query($mysqli,$disply_ca))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check2=mysqli_fetch_assoc($check_result2);
                                                                  }
                                        
                                                
                                                
                                    ?>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="card-body">
                                        <h4 class="card-title">Certification Authority Details</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"> Name:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check2['certification_authority'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Website:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check2['authority_website'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Contact Email:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check2['authority_email'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Contact #:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check2['authority_contact'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Address:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check2['Address'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                    <hr>
                                    <?php
                                    if($_SESSION['useraccess']==2 || $_SESSION['useraccess']==1){
                                        
                                        $disply_brand="SELECT * FROM brands WHERE brkey='$key'";

                                                                if ($check_result1=mysqli_query($mysqli,$disply_brand))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check1=mysqli_fetch_assoc($check_result1);
                                                                  }
                                        
                                                
                                                
                                    ?>
                                    <div class="card-body">
                                        <h4 class="card-title">Brand Details</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Name:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $check1['brand_name'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Brand Website:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check1['brand_website'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Description:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check1['brand_description'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Brand Manager:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check1['brand_manager'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Brand Email:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $check1['brand_email'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <?php
                                    }?>
                                    <hr>
                                    <?php
                                    if($_SESSION['useraccess']==4 && $_SESSION['useraccess']==1){
                                        
                                        $disply_ulema="SELECT * FROM ulema WHERE ulkey='$key'";

                                                                if ($check_result3=mysqli_query($mysqli,$disply_ulema))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check3=mysqli_fetch_assoc($check_result3);
                                                                  }
                                        
                                                
                                                
                                    ?>
                                    <div class="card-body">
                                        <h4 class="card-title">Ulema Details</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Designation:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php $check3['designation'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Affiliation:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php $check3['certification_authority'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Contact#:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php $check3['ulema_contact'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Address:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php $check3['address'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <hr>
                                    <div class="form-actions">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-danger"> <i class="fa fa-pencil"></i> Edit</button>
                                                            <button type="button" class="btn btn-dark">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Row -->
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
    <!-- customizer Panel -->
    <!-- ============================================================== -->
                <!-- Row -->
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
            <footer class="footer text-center">
                All Rights Reserved by AdminBite admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
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