<?php
session_start();

include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

?>
<?php 
if(isset($_POST['submit'])){
    
 $fatwa_question=$_POST['fatwa_question'];
 $ulema_name=$_POST['ulema_name'];
 $cert_authority=$_POST['cert_authority'];
 $fatwa_title=$_POST['fatwa_title'];
 $fatwa_answer=$_POST['fatwa_answer'];
 $darul_iftah=$_POST['darul_iftah'];
 $fatwa_type=$_POST['fatwa_type'];
 $fatwa_date=$_POST['fatwa_date'];
 $fatwa_doc = $_FILES['usavatar']['name'];
            $usr_avatar_type = $_FILES['usavatar']['type'];
            $usr_avatar_size = $_FILES['usavatar']['size'];
            $usr_avatar_tmp_name = $_FILES['usavatar']['tmp_name'];
            move_uploaded_file($usr_avatar_tmp_name, "fatwa_docs/$fatwa_doc");

            if ($fatwa_doc!="") {
            $query="INSERT INTO `fatawa`(fatwa_question,ulema_name,cert_authority,fatwa_title,fatwa_answer,fatwa_type,fatwa_date,fatwa_doc,darul_iftah) ";
    $query.="VALUES('$fatwa_question','$ulema_name','$cert_authority','$fatwa_title','$fatwa_answer','$fatwa_type','$fatwa_date','$fatwa_doc','$darul_iftah')";
            
            if ($mysqli->query($query) == TRUE) {

          
                            echo "<script>alert('Fatwa has been added to the Database.');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";
            }
                else
                {
                    echo "Data not inserted'.mysqli_error($query)";
                }
                                                        
        }
        else{

            $query="INSERT INTO `fatawa`(fatwa_question,ulema_name,cert_authority,fatwa_title,fatwa_answer,fatwa_type,fatwa_date,darul_iftah) ";
    $query.="VALUES('$fatwa_question','$ulema_name','$cert_authority','$fatwa_title','$fatwa_answer','$fatwa_type','$fatwa_date','$darul_iftah')";
            
            if ($mysqli->query($query) == TRUE) {

          
                            echo "<script>alert('Fatwa has been added to the Database.');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";
            }
                else
                {
                    echo "Data not inserted'.mysqli_error($query)";
                }
                                                        
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
                        <h4 class="page-title">Add Fatwa</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Fatwa</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Fatwa</li>
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
                                <h4 class="card-title" aligh="center">Fatwa</h4>
                                <h6 class="card-subtitle">Please add the Fatwa Details which are required below.</h6>
                            </div>
                            <hr>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Question</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ename" placeholder="Enter the Question" name="fatwa_question">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">Darul Iftah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pname" placeholder="Enter the name of the Darul Iftah" name="darul_iftah">
                                        </div>
                                    </div>
                                    <?php
                                                             $uid=$_SESSION['uid'];
                         
                         $disply_info="SELECT * FROM tbl_login WHERE id=$uid";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  }
                                        
                                                    $key=$check['refkey'];
                                                    
                                                    $disply_ul="SELECT * FROM ulema WHERE ulkey='$key'";

                                                                if ($check_result2=mysqli_query($mysqli,$disply_ul))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check2=mysqli_fetch_assoc($check_result2);
                                                                  }
                                                    
                                   

                                    ?>
                                    
                                     <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Affiliation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ename" name="cert_authority" readonly value="<?php echo $check2['certification_authority']; ?>" placeholder="Enter the Certification Authority Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the Title of this Question" name="fatwa_title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Ulema Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" readonly value="<?php echo $check2['ulema_name']; ?>" placeholder="Enter the Ulema Name" name="ulema_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Answer</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="7" placeholder="Enter your Answer" name="fatwa_answer"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Type</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="rate" placeholder="Enter the type of Fatwa" name="fatwa_type">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Documents</label>
                                    <div class="col-sm-9 ">
                                        <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" onchange="readURL(this);" class="custom-file-input" name="usavatar" id="inputGroupFile04">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose Documents(Only PDF)</label>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="stime" class="col-sm-3 text-right control-label col-form-label">Answer Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="date" name="fatwa_date">
                                        </div>
                                    </div>
                                </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right row align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" aligh="center" name="submit">Add Fatwa</button>
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
</body>

</html>