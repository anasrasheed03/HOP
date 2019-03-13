<?php
session_start();
$id=$_SESSION['uid'];
include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

?>

<?php 

if(isset($_POST['submit'])){
    
 $title=$_POST['title'];
 $email=$_POST['email'];
 $question=$_POST['question'];
            $query="INSERT INTO `askquery`(title,email,question,user_id,type,Qtype) ";
    $query.="VALUES('$title','$email','$question','$id',1,2)";
            
            if ($mysqli->query($query) == TRUE) {
                            echo "<script>alert('Question has been added to the Database');</script>";
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
                        <h4 class="page-title">Ask Ulema</h4>
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
                                <h4 class="card-title" aligh="center">Want to Ask Question?</h4>
                                <h6 class="card-subtitle">Enter the Required details below to ask a Question from Ulema.</h6>
                            </div>
                            <hr>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title" placeholder="Enter the title of the Question" name="title">
                                        </div>
                                    </div>
                                    <?php 
                                    
                                    $query="select * from tbl_login where id=$id";
                                    if($results=mysqli_query($mysqli,$query)){
                                        $data=mysqli_fetch_assoc($results);
                                        
                                    }
                                    $email=$data['email'];
                                    ?>
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" readonly id="email" value="<?php echo $email; ?>" placeholder="Enter the your email address" name="email">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="rate" class="col-sm-3 text-right control-label col-form-label">Question?</label>
                                        <div class="col-sm-9">
                                            <textarea id="mymce" name="question" id="question"></textarea>
                                        </div>
                                    </div>
                                    
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right row align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" aligh="center" name="submit">Submit Question</button>
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
    <script src="assets/libs/tinymce/tinymce.min.js"></script>
    <script>
    $(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>
</body>

</html>