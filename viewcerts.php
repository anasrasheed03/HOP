<?php
session_start();
$cid=$_GET['id'];
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
    <title>Admin Portal - Halal o Product Verifier</title>
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
                        <h4 class="page-title">View Authority</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Certification Authorities</li>
                                    <li class="breadcrumb-item active" aria-current="page">View Authority</li>
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
                                <?php 
                                        
                                            $disply_info="SELECT * FROM certification_authorities WHERE authority_id=$cid";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  
                                                                  }
                                        
                                                    $brand=$check['certification_authority'];
                                                    $key=$check['crkey'];    
                                                    $u=$_SESSION['uid'];
                                        $check_access="SELECT * FROM tbl_login WHERE id=$u";
                                        if ($test=mysqli_query($mysqli,$check_access))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $user=mysqli_fetch_assoc($test);
                                                                  
                                                                  }
                                                                  $ukey=$user['refkey'];
                                            ?>
                                <?php 
    
$status=$_GET['status'];
if((isset($status) && $ukey===$key) ||(isset($status) && $_SESSION['useraccess']==1)){
if(isset($_POST['update'])){
    
 $certification_authority=$_POST['certification_authority'];
 $ceo=$_POST['ceo'];
 $Manager=$_POST['Manager'];
 $authority_description=$_POST['authority_description'];
 $authority_website=$_POST['authority_website'];
 $authority_email=$_POST['authority_email'];
 $authority_contact=$_POST['authority_contact'];
 $Address=$_POST['Address'];
 $cert_logo = $_FILES['usavatar']['name'];
            $usr_avatar_type = $_FILES['usavatar']['type'];
            $usr_avatar_size = $_FILES['usavatar']['size'];
            $usr_avatar_tmp_name = $_FILES['usavatar']['tmp_name'];
            move_uploaded_file($usr_avatar_tmp_name, "cert_logos/$cert_logo");
            if ($cert_logo!="") {
            $query="UPDATE certification_authorities SET certification_authority='$certification_authority',ceo='$ceo',Manager='$Manager',authority_description='$authority_description',authority_email='$authority_email',authority_website='$authority_website',authority_contact=$authority_contact,cert_logo='$cert_logo' WHERE authority_id=$cid";
            
            if ($mysqli->query($query) == TRUE) {

                            echo "<script>alert('Certification Authority has been update in the Server.');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";
            }
                else
                {
                    echo "Data not inserted'.mysqli_error($query)";
                }
                                                        
    
    
    
       
}else{
    
    $query="UPDATE certification_authorities SET certification_authority='$certification_authority',ceo='$ceo',Manager='$Manager',authority_description='$authority_description',authority_email='$authority_email',authority_website='$authority_website',authority_contact=$authority_contact  WHERE authority_id=$cid";
            
            if ($mysqli->query($query) == TRUE) {

                            echo "<script>alert('Certification Authority has been Updated in the Server.');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";
            }
                else
                {
                    echo "Data not inserted'.mysqli_error($query)";
                }
}

}
?>

                  <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" aligh="center">Update Certification Authority Details</h4>
                                </div>
                            <hr>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ename" readonly value="<?php echo $check['certification_authority'];?>" placeholder="Enter the certification authority name" name="certification_authority">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">CEO</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pname" value="<?php echo $check['ceo'];?>" placeholder="Enter certification authority CEO name" name="ceo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rate" class="col-sm-3 text-right control-label col-form-label">Manager</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" value="<?php echo $check['Manager'];?>" placeholder="Enter the manager name" name="Manager">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rate" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" value="<?php echo $check['authority_description'];?>" placeholder="Enter the manager name" name="authority_description">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $check['authority_website'];?>" id="rate" placeholder="Enter the certification authority website" name="authority_website">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Contact Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $check['authority_email'];?>" id="rate" placeholder="Enter the contact email for Certification Authority" name="authority_email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Contact #</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $check['authority_contact'];?>" id="rate" placeholder="Enter the contact phone number for Certification Authority" name="authority_contact">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" value="<?php echo $check['Address'];?>" placeholder="Enter the your physical address" name="Address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Logo</label>
                                    <div class="col-sm-9 ">
                                        <img id="blah"  src="cert_logos/<?php echo $check['cert_logo'];?>" height="200px" width="200px" alt="your image" />
                                        <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" onchange="readURL(this);" class="custom-file-input" name="usavatar"  id="inputGroupFile04">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right row align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" aligh="center" name="update">Update Certification Authority</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                                
                                <?php
                                }else{
                                ?>
                                
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="white-box text-center"> <img src="cert_logos/<?php echo $check['cert_logo'];?>" class="img-responsive"> </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-6">
                                        <?php 
                                                                  if($ukey===$key || $_SESSION['useraccess']==1){
                                        ?>
                                        <a class="btn btn-primary " href="viewcerts.php?id=<?php echo $cid; ?>&status=edit" role="button">Edit</a>
                                        <?php 
                                                                  }
                                        ?>
                                        <h2 class="card-title"><?php echo $check['certification_authority'];?></h2>
                                        <h4 class="box-title">Description</h4>
                                        <p><?php echo $check['authority_description']; ?></p>
                                        
                                        <h3 class="box-title m-t-40">Key Information</h3>
                                        <ul class="list-unstyled">
                                            <li><h5><i class="fa fa-check text-success"></i> &nbsp;Website:&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $check['authority_website']; ?></b></h5></li>
                                            <li><h5><i class="fa fa-check text-success"></i> &nbsp;Contact:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <b><?php echo $check['authority_contact']; ?></b></h5></li>
                                            </ul>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h3 class="box-title m-t-40">General Info</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td width="390">Email</td>
                                                        <td> <?php echo $check['authority_email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Manager</td>
                                                        <td> <?php echo $check['Manager']; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>CEO</td>
                                                        <td> <?php echo $check['ceo']; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td> <?php echo $check['Address']; ?> </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                                            
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-xl-3 col-md-3">
                        <div class="card">
                            
                            <div class="card-body">
                                
                                
                                
                                <div class="list-group m-t-30">
                                    <a href="javascript:void(0)" class="list-group-item active"><i class="ti-layers m-r-10"></i> All Contacts</a>
                                    <a href="javascript:void(0)" class="list-group-item"><i class="ti-bookmark m-r-10"></i>Total No of Contacts: <b><?php
                                            
                                        $check_query="SELECT * FROM tbl_login WHERE refkey='$key'";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></b></a>
                                </div>
                                <h4 class="card-title m-t-30">Affiliated Users</h4>
                                <div class="list-group">
                                     <?php
                                            
                                        $check_query1="SELECT * FROM tbl_login WHERE refkey='$key'";
                                                        $result = $mysqli->query($check_query1);
                                                        
                                                                if ($result->num_rows > 0){
                                                                  
                                                                  while($check_rowcount1 = $result->fetch_assoc()) { 
                                                                     
                                                                  
                                        ?>
                                    
                                    <a href="viewuser.php?id=<?php echo $check_rowcount1['id']?>" class="list-group-item"><i class="ti-flag-alt-2 m-r-10"></i> <?php echo $check_rowcount1['loginid'];?> 
                                    </a>
                                    <?php 
                                                                  }
                                                                }
                                    ?>
                                </div>
                                <h4 class="card-title m-t-30">More</h4>
                                <div class="list-group">
                                    <a href="javascript:void(0)" class="list-group-item">  
                                        <span class="badge badge-info m-r-10"><i class="ti-import"></i></span> Export Certification Authority Report 
                                    </a>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List of All Brands from <?php $check['certification_authorities']; ?></h4>
                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                                                                       <tr>
                                                <th>Name</th>
                                                <th>Website</th>
                                                <th>Contact</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                        
                                            $disply_product="SELECT * FROM brands WHERE certification_authority='$brand'";

                                                             $view_veh_result = $mysqli->query($disply_product);
                                                                if ($view_veh_result->num_rows > 0) {
                                                                                            // output data of each row
                                                    while($check2 = $view_veh_result->fetch_assoc()) {
                                        
                                                            
                                            ?>
                                            <tr>
                                                
                                                <td>
                                                    <a href="viewbrand.php?b=<?php echo $check2['brand_name'];?>"><?php echo $check2['brand_name'];?></a>
                                                </td>
                                                <td><?php echo $check2['brand_website'];?></td>
                                                <td><?php echo $check2['brand_contact'];?></td>
                                                <td><?php echo $check2['brand_description'];?></td>
                                                
                                                <td><?php 
                                                if($check2['status']==1){
                                                echo '<span class="label label-success">Approved</span>';     
                                                }elseif($check2['status']==2){
                                                echo '<span class="label label-danger">Rejected</span>';     
                                                }elseif($check2['status']==0){
                                                echo '<span class="label label-warning">Pending</span>';     
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
                        </div>
                        <?php 
                                }
                                ?>
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