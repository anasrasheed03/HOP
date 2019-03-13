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
                        <h4 class="page-title">Question List</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Discussion</li>
                                    <li class="breadcrumb-item active" aria-current="page">Ask Ulema</li>
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
                                <h4 class="card-title">List of All Asked Questions</h4>
                                <div class="row m-t-40">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php
      
                                        $check_query="SELECT * FROM askquery where type=1";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></h1>
                                                <h6 class="text-white">Total Questions</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?php
      
                                        $check_query="SELECT * FROM askquery where status=0";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></h1>
                                                <h6 class="text-white">In Progress</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?php
      
                                        $check_query="SELECT * FROM askquery where status=2";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></h1>
                                                <h6 class="text-white">Closed</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?php
      
                                        $check_query="SELECT * FROM askquery where status=1";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></h1>
                                                <h6 class="text-white">Open</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>Created by</th>
                                                <th>Date</th>
                                                <th>Ulema</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $query="Select * from askquery where type=1";
                                            $results=mysqli_query($mysqli,$query);
                                                if($results->num_rows>0){
                                                while($list=$results->fetch_assoc()){
                                                    $status=$list['status'];
                                                    $title=$list['title'];
                                                    $email=$list['email'];
                                                    $id=$list['id'];
                                                    $date=$list['date'];
                                            ?>
                                            
                                            <tr>
                                                <td><?php 
                                                                if($status==0){
                                                                    echo "<span class='label label-warning'>In Progress</span>";
                                                                }elseif($status==1){
                                                                    echo "<span class='label label-success'>Opened</span>";
                                                                }elseif($status==2){
                                                                    echo "<span class='label label-danger'>Closed</span>";
                                                                }
                                                        
                                                
                                                ?></td>
                                                <td><a href="viewquestion.php?id=<?php echo $id; ?>" class="font-medium link"><?php echo $title; ?></a></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td>Ulema Name</td>
                                            </tr>
                                            <?php 
                                                }
                                                }
                                            ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>Created by</th>
                                                <th>Date</th>
                                                <th>Ulema</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
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
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-advanced.init.js"></script>
</body>

</html>