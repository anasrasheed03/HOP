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
                        <h4 class="page-title">View Users</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">User</li>
                                    <li class="breadcrumb-item active" aria-current="page">View Users</li>
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
                    <!-- Column -->
                    <div class="col-lg-8 col-xl-9 col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">All Contacts</h4>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Loginid</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if (isset($_GET['ref'])) {
                                                $FETref=$_GET['ref'];                                                
                                                $search_query="SELECT * FROM tbl_login WHERE status=1 AND role='$FETref' ORDER BY datecreated ASC";
                                            }
                                            else{
                                            $search_query="SELECT * FROM tbl_login ORDER BY datecreated ASC";
                                            }
                                               $view_veh_result = $mysqli->query($search_query);
                                               $sr=0;

                                                 if ($view_veh_result->num_rows > 0) {
                                                                                            // output data of each row
                                                    while($row = $view_veh_result->fetch_assoc()) {

                                                    $loginid = $row['loginid'];
                                                    $email = $row['email'];
                                                    $picture = $row['pictures'];
                                                    $role = $row['role'];
                                                    $id = $row['id'];

                                                                                                

                                            ?>
                                            <tr>
                                                
                                                <td>
                                                    <a href="viewuser.php?id=<?php echo $id;?>"><img src="img/<?php echo $picture;?>" alt="user" class="rounded-circle" width="30" /> <?php echo $loginid?></a>
                                                </td>
                                                <td><?php echo $email;?></td>
                                                <td><?php 
                                                if($role==1){
                                                echo '<span class="label label-info">Admin</span>';     
                                                }elseif($role==2){
                                                echo '<span class="label label-danger">Brand</span>';     
                                                }elseif($role==3){
                                                echo '<span class="label label-success">Certification Authority</span>';     
                                                }elseif($role==4){
                                                echo '<span class="label label-warning">Ulema</span>';     
                                                }elseif($role==5){
                                                echo '<span class="label label-inverse">Users</span>';     
                                                }
                                                
                                                 
                                                ?>
                                                     </td>
                                             
                                            </tr>
                                            
                                            <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 col-xl-3 col-md-3">
                        <div class="card">
                            
                            <div class="card-body">
                                
                                <div class="list-group m-t-30">
                                    <a href="javascript:void(0)" class="list-group-item active"><i class="ti-layers m-r-10"></i> All Contacts</a>
                                    <a href="javascript:void(0)" class="list-group-item"><i class="ti-bookmark m-r-10"></i> Recently Created</a>
                                </div>
                                <h4 class="card-title m-t-30">Groups</h4>
                                <div class="list-group">
                                    <a href="viewusers.php?ref=1" class="list-group-item"><i class="ti-flag-alt-2 m-r-10"></i> Admins 
                                        <span class="badge badge-info float-right"> <?php
      
                                        $check_query="SELECT * FROM tbl_login WHERE status=1 AND role=1";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></span>
                                    </a>
                                    <a href="viewusers.php?ref=3" class="list-group-item"><i class="ti-notepad m-r-10"></i> Certification Authorities
                                        <span class="badge badge-success float-right"><?php
      
                                        $check_query="SELECT * FROM tbl_login WHERE status=1 AND role=3";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></span>
                                    </a>
                                    <a href="viewusers.php?ref=5" class="list-group-item"><i class="ti-target m-r-10"></i> Users
                                        <span class="badge badge-dark float-right"><?php
      
                                        $check_query="SELECT * FROM tbl_login WHERE status=1 AND role=5";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></span>
                                    </a>
                                    <a href="viewusers.php?ref=2" class="list-group-item"><i class="ti-comments m-r-10"></i> Brands
                                        <span class="badge badge-danger float-right"><?php
      
                                        $check_query="SELECT * FROM tbl_login WHERE status=1 AND role=2";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></span>
                                    </a>
                                    <a href="viewusers.php?ref=4" class="list-group-item"><i class="ti-comments m-r-10"></i> Ulemas
                                        <span class="badge badge-warning float-right"><?php
      
                                        $check_query="SELECT * FROM tbl_login WHERE status=1 AND role=4";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></span>
                                    </a>
                                </div>
                                <h4 class="card-title m-t-30">More</h4>
                                <div class="list-group">
                                    <a href="javascript:void(0)" class="list-group-item">  
                                        <span class="badge badge-info m-r-10"><i class="ti-import"></i></span> Import Contacts
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-warning text-white m-r-10"><i class="ti-export"></i></span> Export Contacts
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-success m-r-10"><i class="ti-share-alt"></i></span> Restore Contacts
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-primary m-r-10"><i class="ti-layers-alt"></i></span> Duplicate Contacts
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <span class="badge badge-danger m-r-10"><i class="ti-trash"></i></span> Delete All Contacts
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
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
            <!-- Share Modal -->
            <div class="modal fade" id="Sharemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-auto-fix m-r-10"></i> Share With</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Name Here" aria-label="Username">
                                </div>
                                <div class="row">
                                    <div class="col-3 text-center">
                                        <a href="#Whatsapp" class="text-success">
                                        <i class="display-6 mdi mdi-whatsapp"></i><br><span class="text-muted">Whatsapp</span>
                                    </a>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a href="#Facebook" class="text-info">
                                        <i class="display-6 mdi mdi-facebook"></i><br><span class="text-muted">Facebook</span>
                                    </a>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a href="#Instagram" class="text-danger">
                                        <i class="display-6 mdi mdi-instagram"></i><br><span class="text-muted">Instagram</span>
                                    </a>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a href="#Skype" class="text-cyan">
                                        <i class="display-6 mdi mdi-skype"></i><br><span class="text-muted">Skype</span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Create Modal -->
            <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create New Contact</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Name Here" aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number Here" aria-label="no">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
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