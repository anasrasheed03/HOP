<?php
session_start();
include('config/db.php');
if(!isset($_SESSION["useraccess"])){
    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 4){
header("Location: index.php");

exit(); }}

?>
   <?php
    if(isset($_POST['submit']))
{
    $qc =  "www.fyp.softnowsolutions.com";
    $product_name=$_POST['product_name'];
    $entry_person=$_POST['entry_person'];
    $brand_name=$_POST['brand_name'];
    $batch_no=$_POST['batch_no'];
    $product_barcode=$_POST['bar_code'];
    $expiry_date=$_POST['exp_date'];
    $product_ingredients=$_POST['ingredients'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $product_description=$_POST['product_description'];
  
  $product_picture = $_FILES['usavatar']['name'];
        
  if ($product_picture!="") {
                                                    
            $usr_avatar_type = $_FILES['usavatar']['type'];
            $usr_avatar_size = $_FILES['usavatar']['size'];
            $usr_avatar_tmp_name = $_FILES['usavatar']['tmp_name'];
            move_uploaded_file($usr_avatar_tmp_name, "product_pictures/$product_picture");


            $query="INSERT INTO `products`(product_name,batch_no,product_barcode,expiry_date,product_ingredients,brand_name,entry_person,category,price,product_description,product_picture) ";
            $query.="VALUES('$product_name','$batch_no','$product_barcode','$expiry_date','$product_ingredients','$brand_name','$entry_person','$category','$price','$product_description','$product_picture')";
            
            if ($mysqli->query($query) == TRUE) {

          
                            echo "<script>alert('Product has been added to the Server for request.');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";;
            }
                else
                {
                    echo "Data not inserted'.mysqli_error($query)";
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
                        <h4 class="page-title">Add Products</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Products</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal"  method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                         <h4 class="card-title" aligh="center">Enter Product Details</h4>
                                <h6 class="card-subtitle">Add the product Details which are required below</h6>
                                        <hr>
                                        <?php 
                         $uid=$_SESSION['uid'];
                         
                         $disply_info="SELECT * FROM tbl_login WHERE id=$uid";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  }
                                        
                                                    $key=$check['refkey'];
                                                    
                                                    $disply_br="SELECT * FROM brands WHERE brkey='$key'";

                                                                if ($check_result2=mysqli_query($mysqli,$disply_br))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check2=mysqli_fetch_assoc($check_result2);
                                                                  }
                                                    
                                    if($check2['brkey']!="" || $_SESSION['useraccess']==1){
                                    
                         
                         ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Brand Name</label>
                                        <div class="col-sm-9">
                                            <?php 
                                            if($check2['brand_name']==''&$_SESSION['useraccess']==1){
                                            ?>
                                            <input type="text" class="form-control" id="ename" name="brand_name" placeholder="Enter the Brand Name">
                                            <?php 
                                            }else{
                                                ?>
                                            <input type="text" class="form-control" id="ename" name="brand_name" readonly value="<?php echo $check2['brand_name'] ?>" placeholder="Enter the Brand Name">    
                                            <?}
                                            ?>
                                        </div>
                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">Entry Person Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $check["loginid"];?>" id="pname" placeholder="" name="entry_person" readonly>
                                        </div>
                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                        <label for="rate" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Correct Name of the Product from Package" name="product_name">
                                        </div>
                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Batch No</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the Product batch No" name="batch_no">
                                        </div>
                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the Product Price example 29.00" name="price">
                                        </div>
                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Bar Code No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the Product Matching Bar Code No" name="bar_code">
                                        </div>
                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                        <label for="date" class="col-sm-3 text-right control-label col-form-label">Expiry Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="from" name="exp_date">
                                        </div>
                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="category">
                                                <option>Choose Your Category</option>
                                                <option value="snacks">Snacks</option>
                                                <option value="biscuit">Biscuit</option>
                                                <option value="water">Water</option>
                                                <option value="drinks">Drink</option>
                                                <option value="tea">TEA</option>
                                                <option value="raw_item">Raw Item</option>
                                            </select>
                                        </div>
                                    </div>
                                            </div>
                                            
                                     </div>
                                     <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                        <label for="note1" class="col-sm-3 text-right control-label col-form-label">Ingredients</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="4" placeholder="Enter The List of all Ingredients Use in product" name="ingredients"></textarea>
                                        </div>
                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                        <label for="note1" class="col-sm-3 text-right control-label col-form-label">Product Description</label>
                                        <div class="col-sm-9">
                                             <textarea class="form-control" rows="4" placeholder="Enter the Short description of the Product" name="product_description"></textarea>
                                        </div>
                                    </div>
                                            </div>
                                            </div>
                                     <div class="row">
                                            <!--/span-->
                                            <div class="col-md-9">
                                                <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Product Packing Picture</label>
                                    <div class="col-sm-6 ">
                                        <img id="blah"  src="assets\images\avatar.png" height="200px" width="200px" alt="your image" />
                                        <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" onchange="readURL(this);" class="custom-file-input" name="usavatar" id="inputGroupFile04">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr> </div>
                                    <div class="form-group m-b-0 text-right  text-right row align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light"  name="submit">Submit Product</button>
                                        </div>
                                </form>
                           <?php
                                    }else{
                                        echo "<h2 align='center'>Sorry You're not affiliated with any brand.</h2>";
                                    }
    ?>
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
        var dateToday = new Date();
var dates = $("#from").datepicker({
    defaultDate: "+1d",
    changeMonth: true,
    numberOfMonths: 2,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "from" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
});
        
    </script>
    
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