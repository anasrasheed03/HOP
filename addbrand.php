<?php
session_start();

include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

?>

<?php 
if(isset($_POST['submit'])){
    
 $brand_name=$_POST['brand_name'];
 $brand_manager=$_POST['brand_manager'];
 $brand_email=$_POST['brand_email'];
 $brand_contact=$_POST['brand_contact'];
 $brand_website=$_POST['brand_website'];
 $brand_description=$_POST['brand_description']; 
 $activationcode=md5($email.time());
 $certification_authority=$_POST['certification_authority'];
 $usr_cover_name = $_FILES['usavatar']['name'];
        if ($usr_cover_name!="") {
                                                    
            $usr_avatar_type = $_FILES['usavatar']['type'];
            $usr_avatar_size = $_FILES['usavatar']['size'];
            $usr_avatar_tmp_name = $_FILES['usavatar']['tmp_name'];
            move_uploaded_file($usr_avatar_tmp_name, "logos/$usr_cover_name");


            $query="INSERT INTO `brands`(brand_name,brand_manager,brand_email,brand_contact,brand_website,brand_description,certification_authority,brand_logo,brkey) ";
    $query.="VALUES('$brand_name','$brand_manager','$brand_email','$brand_contact','$brand_website','$brand_description','$certification_authority','$usr_cover_name','$activationcode')";
            
            if ($mysqli->query($query) == TRUE) {

            $to=$brand_email;
            $msg= "Thanks for new Registration.";   
            $subject="Email Verification";
            $headers .= "MIME-Version: 1.0"."\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                    $headers .= 'From:Halal o Product Verifier <contact@halaloproduct.pk>'."\r\n";
                    
            $ms.="<html></body><div><div>Dear $brand_manager,</div></br></br>";
            $ms.="<div style='padding-top:8px;'>Your account information is successfully created in our portal, Please click the following link For verifying and activate your account.</div>
            <div style='padding-top:10px;'><a href='https://www.maknam.com/Portal2/register.php?ref=$activationcode&&tor=br'>Click Here</a></div>
            <div style='padding-top:4px;'> powered by <a href='halaloproduct.pk'>Halaloproduct.pk</a></div></div>
            </body></html>";
            mail($to,$subject,$ms,$headers);
                            echo "<script>alert('Brand Request has been added to the Database, please verify your account in the registered Email-Id');</script>";
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
                        <h4 class="page-title">Add Brands</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Brands</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
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
                                <h4 class="card-title" aligh="center">Enter Brand Details</h4>
                                <h6 class="card-subtitle">Please add the Brand Details which are required below.</h6>
                            </div>
                            <hr>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Brand Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ename" placeholder="Enter the Brand Name" name="brand_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">Brand Manager</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pname" placeholder="Enter Brand Manager Name" name="brand_manager">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rate" class="col-sm-3 text-right control-label col-form-label">Contact Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the Contact email for general queries" name="brand_email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the brand website" name="brand_website">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the brand short description" name="brand_description">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Contact</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Contact Phone Number" name="brand_contact">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Affiliation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Contact Phone Number" name="certification_authority">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Brand Logo</label>
                                    <div class="col-sm-9 ">
                                        <img id="blah"  src="assets\images\avatar.png" height="200px" width="200px" alt="your image" />
                                        <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" onchange="readURL(this);" class="custom-file-input" name="usavatar" id="inputGroupFile04">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right row align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" aligh="center" name="submit">Submit Brand Request</button>
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
</body>

</html>