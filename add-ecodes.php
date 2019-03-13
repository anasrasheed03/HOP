<?php
session_start();

include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

?>

<?php 
if(isset($_POST['submit'])){
    
 $type=$_POST['type'];
 $ingredient=$_POST['ingredient'];
 $e_code=$_POST['e_code'];
 $source=$_POST['source'];
 $origin=$_POST['origin'];
 $status=$_POST['status']; 
 $certification_authority=$_POST['certification_authority'];

            $query="INSERT INTO `ecodes`(type,ingredient,e_code,source,origin,status,certification_authority) ";
    $query.="VALUES('$type','$ingredient','$e_code','$source','$origin','$status','$certification_authority')";
            
            if ($mysqli->query($query) == TRUE) {
                            echo "<script>alert('E-Code has been added to the Database');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";;
                }
                else
                {
                    echo "Data not inserted'.mysqli_error($veh_query)";
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
                        <h4 class="page-title">Add E-Codes</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">E-codes</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add E-code</li>
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
                                <h4 class="card-title" aligh="center">E-Codes Details</h4>
                                <h6 class="card-subtitle">Please add the E-codes Details which are required below.</h6>
                            </div>
                            <hr>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Type of E-Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ename" placeholder="Enter the type of E-code" name="type">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">Name Of Ingredient</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pname" placeholder="Enter the Name Of  Ingredient" name="ingredient">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rate" class="col-sm-3 text-right control-label col-form-label">E-Code No</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the E-code Number" name="e_code">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Source</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the source" name="source">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Origin</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the e-code Origin" name="origin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the Status of E-code" name="status">
                                        </div>
                                    </div>
                                    <?php 
                                    $user=$_SESSION["uid"];
                                    $query="select * from tbl_login where id=$user";
                                    if($results=mysqli_query($mysqli,$query)){
                                        
                                        $u=mysqli_fetch_assoc($results);
                                    }
                                    
                                    $key=$u['refkey'];
                                    
                                    $ca="select * from certification_authorities where crkey='$key'";
                                     
                                     if($resultsca=mysqli_query($mysqli,$ca)){
                                         
                                         $c=mysqli_fetch_assoc($resultsca);
                                     }
                                     $cname=$c['certification_authority'];
                                    ?>
                                    
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Affiliation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" readonly id="rate" value="<?php echo $cname; ?>" placeholder="Enter the Certification Authority name" name="certification_authority">
                                        </div>
                                    </div>
                                    
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right row align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" aligh="center" name="submit">Submit E-Code</button>
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