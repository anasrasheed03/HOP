<?php
session_start();
$bname=$_GET['b'];
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
                        <h4 class="page-title">View Brand</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Brands</li>
                                    <li class="breadcrumb-item active" aria-current="page">View Brand</li>
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
                                        
                                            $disply_info="SELECT * FROM brands WHERE brand_name='$bname'";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  
                                                                  }
                                        
                                                    $product=$check['brand_name'];
                                                    $key=$check['brkey'];
                                                    $bid=$check['brand_id'];
                                                    $status1=$check['status'];
                                                    $authority=$check['certification_authority'];
                                                    $visit_date = $check['visit_date'];
                                                    
                                                    
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
                                                                  
                                                                    
                                            ?>
                                            
                                <?php 
    
$status=$_GET['status'];
if((isset($status) && $bkey===$key) ||(isset($status) && $_SESSION['useraccess']==1)){
    if(isset($_POST['update'])){
    
 $brand_name=$_POST['brand_name'];
 $brand_manager=$_POST['brand_manager'];
 $brand_email=$_POST['brand_email'];
 $brand_contact=$_POST['brand_contact'];
 $brand_website=$_POST['brand_website'];
 $brand_description=$_POST['brand_description']; 
 $certification_authority=$_POST['certification_authority'];
 $brand_logo = $_FILES['usavatar']['name'];
            $usr_avatar_type = $_FILES['usavatar']['type'];
            $usr_avatar_size = $_FILES['usavatar']['size'];
            $usr_avatar_tmp_name = $_FILES['usavatar']['tmp_name'];
            move_uploaded_file($usr_avatar_tmp_name, "cert_logos/$brand_logo");
            if ($brand_logo!="") {
            $query="UPDATE brands SET brand_name='$brand_name',brand_manager='$brand_manager',brand_email='$brand_email',brand_contact=$brand_contact,brand_website='$brand_website',brand_description='$brand_description',certification_authority='$certification_authority',brand_logo='$brand_logo' WHERE brand_id=$bid";
            
            if ($mysqli->query($query) == TRUE) {

                            echo "<script>alert('Brand has been update in the Server.');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";
            }
                else
                {
                    echo "Data not inserted'.mysqli_error($query)";
                }
                                                        
    
    
    
       
    }else{
    
    $query="UPDATE brands SET brand_name='$brand_name',brand_manager='$brand_manager',brand_email='$brand_email',brand_contact=$brand_contact,brand_website='$brand_website',brand_description='$brand_description',certification_authority='$certification_authority' WHERE brand_id=$bid";
            
            if ($mysqli->query($query) == TRUE) {

                            echo "<script>alert('Brand has been Updated in the Server.');</script>";
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
                                <h4 class="card-title" aligh="center">Update Brands Details</h4>
                                </div>
                            <hr>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Brand Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ename" readonly value="<?php echo $check['brand_name'];?>" placeholder="Enter the Brand Name" name="brand_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">Brand Manager</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pname" placeholder="Enter Brand Manager Name" value="<?php echo $check['brand_manager']; ?>" name="brand_manager">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rate" class="col-sm-3 text-right control-label col-form-label">Contact Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the Contact email for general queries" value= "<?php echo $check['brand_email']; ?>" name="brand_email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the brand website" value="<?php echo $check['brand_website']; ?>" name="brand_website">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" value="<?php echo $check['brand_description']; ?>" placeholder="Enter the brand short description" name="brand_description">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Contact</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Contact Phone Number" value="<?php echo $check['brand_contact']; ?>" name="brand_contact">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Affiliation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Contact Phone Number" readonly value="<?php echo $check['certification_authority']; ?>" name="certification_authority">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Brand Logo</label>
                                    <div class="col-sm-9 ">
                                        <img id="blah"  src="logos/<?php echo $check['brand_logo'];?>" height="200px" width="200px" alt="your image" />
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
                                        <button type="submit" class="btn btn-success waves-effect waves-light" aligh="center" name="update">Update Brand Details</button>
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
                                        <div class="white-box text-center"> <img src="logos/<?php echo $check['brand_logo'];?>" class="img-responsive"> </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-6">
                                        
                                        <?php                   
                                                                  if(($_SESSION['useraccess']==1 || $_SESSION['useraccess']==3) && $status1==0 &&  !$visit_date=='' ){
                                        ?>
                                        <a href="config/approvebrand.php?id=<?php echo $bid; ?>" onclick="return confirm('Are you sure you want to approve this Brand ?');"><button type="button" class="btn waves-effect waves-light btn-success">Accept</button></a>
                                        <a href="config/rejectbrand.php?id=<?php echo $bid; ?>" onclick="return confirm('Are you sure you want to reject this Brand ?');"><button type="button" class="btn waves-effect waves-light btn-danger">Reject</button></a>
                
                                        <?php 
                                                                  }
                                        ?>
                                         <?php 
                                                                  if($bkey===$key || $_SESSION['useraccess']==1){
                                        ?>
                                        <a class="btn btn-success" href="viewbrand.php?b=<?php echo $bname; ?>&status=edit" role="button">Edit</a>
                                        <?php 
                                                                  }
                                        ?>
                                       <?php 
                                                                if(($authority==$cname)||$authority=='' ){             
                                       ?>
                                       
                                       <a class="btn btn-success" href="addvisit.php?b=<?php echo $bname; ?>&c=<?php echo $cid; ?>" role="button">Visit Brand</a> 
                                       <?php 
                                                                }
                                       ?> 
                                        <h2 class="card-title"><?php echo $check['brand_name'];?></h2>
                                        <h4 class="box-title">Brand description</h4>
                                        <p><?php echo $check['brand_description']; ?></p>
                                        
                                        <h3 class="box-title m-t-40">Key Information</h3>
                                        <ul class="list-unstyled">
                                            <li><h5><i class="fa fa-check text-success"></i> &nbsp;Website:&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $check['brand_website']; ?></b></h5></li>
                                            <li><h5><i class="fa fa-check text-success"></i> &nbsp;Contact:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <b><?php echo $check['brand_contact']; ?></b></h5></li>
                                            </ul>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h3 class="box-title m-t-40">General Info</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td width="390">Email</td>
                                                        <td> <?php echo $check['brand_email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brand Manager</td>
                                                        <td> <?php echo $check['brand_manager']; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Affiliation</td>
                                                        <td> <?php echo $authority; ?> </td>
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

                                                                if ($check_result1=mysqli_query($mysqli,$check_query1))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount1=mysqli_fetch_assoc($check_result1);
                                                                  }
                                                                     
                                                                  
                                        ?>
                                    
                                    <a href="viewuser.php?id=<?php echo $check_rowcount1['id']?>" class="list-group-item"><i class="ti-flag-alt-2 m-r-10"></i> <?php echo $check_rowcount1['loginid'];?> 
                                    </a>
                                    
                                </div>
                                <h4 class="card-title m-t-30">More</h4>
                                <div class="list-group">
                                    <a href="javascript:void(0)" class="list-group-item">  
                                        <span class="badge badge-info m-r-10"><i class="ti-import"></i></span> Export Brand Report
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
                                <h4 class="card-title">List of All Products from <?php $check['brand_name']; ?></h4>
                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                           
                                            <tr>
                                                <th>Product</th>
                                                <th>Expiry Date</th>
                                                <th>Batch No</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        
                                            $disply_product="SELECT * FROM products WHERE brand_name='$product'";
                                                $view_veh_result = $mysqli->query($disply_product);
                                                                if ($view_veh_result->num_rows > 0) {
                                                                                            // output data of each row
                                                    while($check2 = $view_veh_result->fetch_assoc()) {
                                                            $product_id=$check2['product_id'];
                                                            $product_name=$check2['product_name'];
                                                            $expiry_date=$check2['expiry_date'];
                                                            $batch_no=$check2['batch_no'];
                                                            $category=$check2['category'];
                                                            $status=$check2['status'];
                                            ?>
                                            <tr>
                                            
                                                 
                                                <td>
                                                    <a href="viewproduct.php?id=<?php echo $product_id ;?>"><?php echo $product_name;?></a>
                                                </td>
                                                <td><?php echo $expiry_date;?></td>
                                                <td><?php echo $batch_no;?></td>
                                                <td><?php echo $category;?></td>
                                                
                                                <td><?php 
                                                if($status==1){
                                                echo '<span class="label label-success">Approved</span>';     
                                                }elseif($status==2){
                                                echo '<span class="label label-danger">Rejected</span>';     
                                                }elseif($status==0){
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