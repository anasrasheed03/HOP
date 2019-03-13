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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Admin Portal - Halal o Produvt Verifier</title>
    <!-- Custom CSS -->
    
    <!-- Custom CSS -->
    <link href="assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <!-- Custom CSS -->
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
                        <h4 class="page-title">Dashboard</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <!-- Info box -->
                <!-- ============================================================== -->
          <div class="row">
                    <div class="col-lg-12">
                        <div class="card  bg-light no-card-border">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        
                                        <img src="img/<?php echo $_SESSION["setpictures"]; ?>" alt="user" width="60" class="rounded-circle" />
                                       
                                    </div>
                                    <div>
                                        <h3 class="m-b-0">Welcome back! <?php echo $_SESSION["username"]; ?></h3>
                                        
                                        <span><?php echo date("l");?>, <?php echo date("d F Y");?></span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
                <div class="card-group">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-danger">
                                        <i class="ti-clipboard text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Products
                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">
                                        <?php
      
                                        $check_query="SELECT * FROM products WHERE status=1";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?>
                                        
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class="ti-wallet text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Brands

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?php
      
                                        $check_query="SELECT * FROM brands WHERE status=1";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="ti-shopping-cart text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Ulema

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">
                                        <?php
      
                                        $check_query="SELECT * FROM ulema WHERE status=1";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?>
                                        
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="ti-shopping-cart text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Fatwas

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">
                                        <?php
      
                                        $check_query="SELECT * FROM fatawa WHERE fatwa_id!=''";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?>
                                        
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <?php
                        if($_SESSION["useraccess"]!=2&&$_SESSION["useraccess"]!=3&&$_SESSION["useraccess"]!=4&&$_SESSION["useraccess"]!=5){
                        ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-warning">
                                        <i class="mdi mdi-currency-usd text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Users

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">
                                        <?php
      
                                        $check_query="SELECT * FROM tbl_login WHERE status=1";

                                                                if ($check_result=mysqli_query($mysqli,$check_query))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount=mysqli_num_rows($check_result);
                                                                  echo $check_rowcount;   
                                                                  }
                                        ?>
                                        </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                    <!-- Card -->
                    <!-- Column -->
                </div>
                
                <div class="card-group">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-danger">
                                        <i class="ti-clipboard text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Halal E-Codes
                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light">
                                        <?php
      
                                        $check_query5="SELECT * FROM ecodes WHERE status='Halal'";

                                                                if ($check_result5=mysqli_query($mysqli,$check_query5))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount5=mysqli_num_rows($check_result5);
                                                                  echo $check_rowcount5;   
                                                                  }
                                        ?>
                                        
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class="ti-wallet text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Haram E-Codes

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?php
      
                                        $check_query6="SELECT * FROM ecodes WHERE status='Haram'";

                                                                if ($check_result6=mysqli_query($mysqli,$check_query6))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check_rowcount6=mysqli_num_rows($check_result6);
                                                                  echo $check_rowcount6;   
                                                                  }
                                        ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <!-- Card -->
                    <!-- Card -->
                    <!-- Card -->
                    <!-- Column -->
                </div>
                
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Expiring Products</h4>
                                        <h5 class="card-subtitle">Recently Expring Products</h5>
                                    </div>
                                    
                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"> <?php 
                                    $query="SELECT * FROM products WHERE status=1";
                                        $results=$mysqli->query($query);
                                        if($results->num_rows>0){
                                                                  
                                                                  // Return the number of rows in result set
                                                               while($checks=$results->fetch_assoc()){
                                                                $expiry_date=$checks['expiry_date'];  
                                                                $product_name=$checks['product_name'];
                                                                $batch_no=$checks['batch_no'];
                                         
                                         
                                         $current_date=date("Y-m-d");
                                         $diff=date_diff(date_create($current_date),date_create($expiry_date));
                                                $dates=$diff->format("%R%a");
                                                if($dates>0 && $dates<7){
                                                    echo "Product Expiring".$dates."days<h5><br/>"."Product Name: ".$product_name."<br/> Batch No :".$batch_no."</h5><br/>"; 
                                                }elseif($dates<0){
                                                    echo "Proudct Expired<br/>"."<h5><br/>"."Product Name: ".$product_name."<br/> Batch No: ".$batch_no."</h5><br/>";
                                                }
                                                
                                                               }
                                        }
                                                                
                                                
                                                
                                                            
                                    ?>

                                </div>
                                <div class="m-r-10">
                                   <?php 
                                   
                                   ?></h2>
                                </div>
                </div>
                
                
                
                
                </div>
                </div>
                 
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                <?php 
                $calendar_query="SELECT * FROM visits";
                                        if ($cal_res= $mysqli->query($calendar_query)) {
                                            
                                            while ($obj = $cal_res->fetch_object()) {
                                                $data[]=array(
                                                    'id'=> $obj->visit_id,
                                                    'title'=> $obj->brand_name,
                                                    'start'=> $obj->date,
                                                    'end'=> $obj->date

                                                    );
                                            }
                                            $cal_res->close();
                                            }
                ?>
                <div class="row">
                <div class="col-lg-12">
                                        <div class="card-body b-l calender-sidebar">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Top Selliing Products -->
                <!-- ============================================================== -->
            
            <div class="row">
               
                    <div class="col-sm-12">
              
                        <div class="card">
                                     <?php 
            if($_SESSION['useraccess']==1){
            ?>    
                            <div class="card-body">
                         
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">User</h4>
                                        <h5 class="card-subtitle">Recently Join Users</h5>
                                    </div>
                                    
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">Login</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Role</th>
                                            <th class="border-top-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                        
                                            $search_query="SELECT * FROM tbl_login ORDER BY datecreated DESC limit 5";
                                            
                                               $view_veh_result = $mysqli->query($search_query);
                                               

                                                 if ($view_veh_result->num_rows > 0) {
                                                                                            // output data of each row
                                                    while($row = $view_veh_result->fetch_assoc()) {

                                                    $loginid = $row['loginid'];
                                                    $email = $row['email'];
                                                    $picture = $row['pictures'];
                                                    $role = $row['role'];
                                                    $id = $row['id'];
                                                    $status=$row['status'];

                                                                                                

                                         

                                            ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10">
                                                        <img src="img/<?php echo $picture;?>" widith="20" height="20"/>
                                                    </div>
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16"><?php echo $loginid;?></h4>
                                                    </div>
                                                </div>
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
                                                
                                                 
                                                ?></td>
                                            
                                            <td><?php 
                                                if($status==0){
                                                echo '<span class="label label-danger">Unverified</span>';     
                                                }elseif($status==1){
                                                echo '<span class="label label-success">Verified</span>';     
                                                }
                                                
                                                 
                                                ?></td>
                                        </tr>
                                         <?php
                                            }
                                        }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Brands</h4>
                                        <h5 class="card-subtitle">Recently Approved Brands</h5>
                                    </div>
                                    
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">Brand Name</th>
                                            <th class="border-top-0">Brand Manager</th>
                                            <th class="border-top-0">Brand Description</th>
                                            <th class="border-top-0">Affiliated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                            $search_query="SELECT * FROM brands WHERE status=1 ORDER BY brand_id DESC limit 5";

                                               $view_veh_result = $mysqli->query($search_query);
                                               $sr=0;

                                                 if ($view_veh_result->num_rows > 0) {
                                                                                            // output data of each row
                                                    while($row = $view_veh_result->fetch_assoc()) {

                                                    $brand_name = $row['brand_name'];
                                                    $manager = $row['brand_manager'];
                                                    $brand_description = $row['brand_description'];
                                                    $authority = $row['certification_authority'];
                                                    $brand_logo = $row['brand_logo'];
                                                    

                                                                                                

                                            ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10">
                                                        <img src="logos/<?php echo $brand_logo;?>" widith="35" height="35"/>
                                                    </div>
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16"><?php echo $brand_name;?></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $manager;?></td>
                                            <td><?php echo $brand_description;?></td>
                                            
                                            <td><?php echo $authority;?></td>
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
                <!-- ============================================================== -->
                <!-- Top Selliing Products -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Top Selliing Products -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Products</h4>
                                        <h5 class="card-subtitle">Recently Approved Products</h5>
                                    </div>
                                    
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">Product</th>
                                            <th class="border-top-0">Brand Name</th>
                                            <th class="border-top-0">Expiry Date</th>
                                            <th class="border-top-0">Batch No</th>
                                            <th class="border-top-0">Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                            $search_query="SELECT * FROM products WHERE status=1 ORDER BY product_id DESC limit 5";

                                               $view_veh_result = $mysqli->query($search_query);
                                               $sr=0;

                                                 if ($view_veh_result->num_rows > 0) {
                                                                                            // output data of each row
                                                    while($row = $view_veh_result->fetch_assoc()) {

                                                    $product_name = $row['product_name'];
                                                    $brand_name = $row['brand_name'];
                                                    $expiry_date = $row['expiry_date'];
                                                    $batch_no = $row['batch_no'];
                                                    $category = $row['category'];
                                                    $product_picture=$row['product_picture'];

                                                                                                

                                            ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10">
                                                        <img src="product_pictures/<?php echo $product_picture?>" widith="35" height="35"/>
                                                    </div>
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16"><?php echo $product_name?></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $brand_name?></td>
                                            <td><?php echo $expiry_date?></td>
                                            <td>
                                                <label class="label label-danger"><?php echo $batch_no?></label>
                                            </td>
                                            <td><?php echo $category?></td>
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
                <!-- ============================================================== -->
                <!-- Top Selliing Products -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
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
            // Basic view
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },
                    defaultDate: '<?php echo date('Y-m-d');?>',
                    editable: false,
                    disableDragging: true,
                    events: <?php echo json_encode($data)?>
                });
         });


    </script>
</body>

</html>