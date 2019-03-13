<?php
session_start();

include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

?>

<?php

function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
}?>

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
    <!-- This page plugin CSS -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

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
                        <h4 class="page-title">Brands Requests</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Brands Request</li>
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
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List of All Pending Products</h4>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 no-wrap table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Brand</th>
                                            <th>Brand Manager</th>
                                            <th>Brand Website</th>
                                            <th>Brand Description</th>
                                            <th>Affiliated</th>
                                            <th>Act</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                            
                                            
                                            
                                            $u=$_SESSION['uid'];
                                        $check_access="SELECT * FROM tbl_login WHERE id=$u";
                                        if ($test=mysqli_query($mysqli,$check_access))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $user=mysqli_fetch_assoc($test);
                                                                  
                                                                  }
                                                                  $bkey=$user['refkey'];
                                                
                                        $check_cr="SELECT * FROM certification_authorities WHERE crkey='$bkey'";
                                        if ($testcr=mysqli_query($mysqli,$check_cr))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $cr=mysqli_fetch_assoc($testcr);
                                                                  
                                                                  }
                                                                  $cid=$cr['authority_id'];
                                                                  $cname=$cr['certification_authority'];
                                                                  
                                                                    
                                            

                                            
                                            
                                            
                                            
                                            
                                            $search_query="SELECT * FROM brands WHERE status=0 ORDER BY brand_id";

                                               $view_veh_result = $mysqli->query($search_query);
                                               $sr=0;

                                                 if ($view_veh_result->num_rows > 0) {
                                                                                            // output data of each row
                                                    while($row = $view_veh_result->fetch_assoc()) {
                                                    $brand_id=$row['brand_id'];
                                                    $brand_name = $row['brand_name'];
                                                    $brand_manager = $row['brand_manager'];
                                                    $brand_website = $row['brand_website'];
                                                    $brand_description = $row['brand_description'];
                                                    $certification_authority = $row['certification_authority'];
                                                    $visit_date = $row['visit_date'];
                                                    

                                                                                                

                                            ?>
                                            <tr>
                                                 <td><a href="viewbrand.php?b=<?php echo $brand_name;?>"><?php echo $brand_name;?></a></td>
                                                <td><?php echo $brand_manager;?></td>
                                                <td><?php echo $brand_website;?></td>
                                                <td><?php echo limit_words($brand_description,9); ?></td>
                                                <td><?php echo $certification_authority;?></td>
                                               <?php 
                                               if($status==0 &&  !$visit_date==''){
                                               ?>
                                                <td>
                                                    <a href="config/approvebrand.php?id=<?php echo $brand_id; ?>" onclick="return confirm('Are you sure you want to approve this Brand ?');" class="on-default edit-row"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Accept"><i class="ti-plus" aria-hidden="true"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="config/rejectbrand.php?id=<?php echo $brand_id; ?>" onclick="return confirm('Are you sure you want to reject this Brand ?');" class="on-default edit-row"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Reject"><i class="ti-close" aria-hidden="true"></i></button></a>
                                                </td>
                                                <?php 
                                               }else{
                                                   ?>
                                                   <td>
                                                    <a class="btn btn-success" href="addvisit.php?b=<?php echo $brand_name; ?>&c=<?php echo $cid; ?>" role="button">Visit Brand</a>
                                                </td>
                                                   
                                                   
                                                   <?php
                                                   
                                               }
                                                ?>
                                            </tr>
                                                                     <?php
                                            }
                                        }
                                        ?>                     
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                    </td>
                                                <td colspan="7">
                                                    <div class="">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination float-right"></ul>
                                                        </nav>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <!-- Column -->
                        <!-- Column -->
                                <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                    
                                </table>
                            
                    </div>
                </div>
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
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
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
    <script src="assets/libs/footable/dist/footable.all.min.js"></script>
    <script src="dist/js/pages/tables/footable-init.js"></script>
</body>

</html>