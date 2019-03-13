<?php
session_start();
$bname=$_GET['b'];
$cid=$_GET['c'];
include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

?>

<?php 
                                                        $disply_brand="SELECT * FROM brands WHERE brand_name='$bname'";

                                                                if ($check_brand=mysqli_query($mysqli,$disply_brand))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $brand=mysqli_fetch_assoc($check_brand);
                                                                  
                                                                  }
                                                                 $bn=$brand['brand_name'];
                                                                  
                                                          $disply_cr="SELECT * FROM certification_authorities WHERE authority_id=$cid";

                                                                if ($check_cr=mysqli_query($mysqli,$disply_cr))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $cr=mysqli_fetch_assoc($check_cr);
                                                                  
                                                                  }        
                                                                 $cn=$cr['certification_authority'];
                                                                  


if(isset($_POST['submit'])){
    
 $brand_name=$_POST['brand_name'];
 $authority_name=$_POST['certification_authority'];
 $purpose=$_POST['purpose'];
 $visit_date=$_POST['visit_date'];
 
 
            $query="INSERT INTO `visits`(brand_name,authority_name,purpose,date) ";
            $query.="VALUES('$brand_name','$authority_name','$purpose','$visit_date')";
            
            $query1="UPDATE brands SET visit_date='$visit_date',certification_authority='$authority_name' where brand_name='$brand_name'";
            
            
            
            if ($mysqli->query($query) == TRUE) {
                    
                            if ($mysqli->query($query1) == TRUE) {
                    
                            echo "<script>alert('Visit Date has Been Added to the Sever');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";
                            
                }
                            
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
    <link href="assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
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
                        <h4 class="page-title">Visit Brand</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Visit Brand</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" aligh="center">Visit Brand</h4>
                                <h6 class="card-subtitle">Please add the Brand visit Details which are required below.</h6>
                            </div>
                            <hr>
                            <form class="form-horizontal m-t-20"  method="POST">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Brand Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ename" value="<?php echo $bn; ?>" readonly placeholder="Enter the certification authority name" name="brand_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">Certification Authority Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pname" value="<?php echo $cn; ?>" readonly placeholder="Enter the certification authority name" name="certification_authority">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rate" class="col-sm-3 text-right control-label col-form-label">Enter the Purpose of Visit</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="visit-purpose" name="purpose" placeholder="Enter the purpose of Visit">
                                        </div>
                                    </div>
                                    
                                <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Visit Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="date"  name="visit_date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <div id="msg" class="col-sm-6 text-right control-label col-form-label"></div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right row align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" aligh="center" name="submit">Add Visit Date</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
           <!-- END MODAL -->
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
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="assets/extra-libs/taskboard/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.horizontal.js"></script>
    <script src="dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="assets/libs/moment/min/moment.min.js"></script>
    <script src="assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="dist/js/pages/calendar/cal-init.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#date").blur(function(e) {
            var visit_date = $(this).val();
            if (visit_date == "")
            {
                $("#msg").html("");
                $("#submit").attr("disabled", true);
            }
            else
            {
                $("#msg").html("checking...");
                $.ajax({
                    url: "config/validatevisit.php",
                    data: {date: visit_date},
                    type: "POST",
                    success: function(data) {
                        if(data > '0') {
                            $("#msg").html('<span class="text-danger">Another Visit on the same date is already Schedule!</span>');
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