<?php
session_start();
$qid=$_GET['id'];
$id=$_SESSION['uid'];
include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

  
                                    
                                    $query="select * from tbl_login where id=$id";
                                    if($results=mysqli_query($mysqli,$query)){
                                        $data=mysqli_fetch_assoc($results);
                                        
                                    }
                                    $email=$data['email'];
                                    $key=$data['refkey'];
                                    $role=$data['role'];
                                    $loginid=$data['loginid'];
                                    
                          
                          
                          
                          
                                  

?>

<?php 

if(isset($_POST['reply'])){
    

 $answer=$_POST['answer'];
            $query="INSERT INTO `askquery`(email,question,user_id,type,Qtype,ref) ";
            $query1="UPDATE `askquery` SET status=1 where id=$qid";
    $query.="VALUES('$email','$answer','$id',2,5,$qid)";
            
            if ($mysqli->query($query) == TRUE) {
                        
                        if ($mysqli->query($query1) == TRUE) {
                            echo "<script>alert('Reply has been added to the Database');</script>";
                             echo "<script>window.location = 'dashboard.php';</script>";;
                                                            }
                        else
                            {
                    echo "Data not inserted'.mysqli_error($veh_query)";
                            }
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
                        <h4 class="page-title">Approved Brands</h4>
                        <br/>
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
                                    <li class="breadcrumb-item active" aria-current="page">Approved Brands</li>
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
            <div class="row">
                 <?php 
                                            $query="Select * from askquery where id=$qid";
                                            $results=mysqli_query($mysqli,$query);
                                                if($results->num_rows>0){
                                                while($list=$results->fetch_assoc()){
                                                    $status=$list['status'];
                                                    $title=$list['title'];
                                                    $email=$list['email'];
                                                    $id=$list['id'];
                                                    $date=$list['date'];
                                                    $question=$list['question'];
                                            ?>
                
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                               
                                
                                <h4 class="card-title">Question</h4> <?php echo $question; ?> 
                            </div>
                        </div>
                        <?php }
                 }?>
                        <div class="card">
                            <div class="card-body">
                                
                                <h4 class="card-title">Ticket Replies</h4>
                                <ul class="list-unstyled m-t-40">
                                    <?php 
                                            $query1="Select * from askquery where ref=$qid";
                                            $reply=mysqli_query($mysqli,$query1);
                                                if($reply->num_rows>0){
                                                while($rep=$reply->fetch_assoc()){
                                                    $remail=$rep['email'];
                                                    $rid=$rep['id'];
                                                    $rdate=$rep['date'];
                                                    $rquestion=$rep['question'];
                                                    
                                            $ul="select * from ulema where ulema_email='$remail'";
                                            if($uemail=mysqli_query($mysqli,$ul)){
                                            $u=mysqli_fetch_assoc($uemail);
                                        
                                         }
                                        $uname=$u['ulema_name'];
                                        

                                            
                                            ?>
                                    <li class="media">
                                        <div class="media-body">
                                           <h5 class="mt-0 mb-1"><?php echo $uname; ?></h5> <?php echo $rquestion; ?> <br/><?php echo $rdate; ?>
                                        </div>
                                    </li>
                                    <hr>
                                    <?php }
                 }
               ?>
                                </ul>
                            </div>
                             
                        </div>
                        <div class="card">
                            
                                <form  method="POST" enctype="multipart/form-data">
                                                                 
                              <div class="card-body">
                                  <h4 class="m-b-20">Write a reply</h4>
                                    <textarea id="mymce" name="answer" id="answer"></textarea>
                                    </div>
                                    <div class="card-body">
                                    <button type="submit" class="btn btn-success waves-effect waves-light" name="reply">Reply</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light" name="replyclose">Reply & close</button>
                                </div>
                                </form>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Question Status</h4>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row text-center">
                                    <div class="col-6 m-t-10 m-b-10">
                                        <span><?php 
                                                                if($status==0){
                                                                    echo "<span class='label label-warning'>In Progress</span>";
                                                                }elseif($status==1){
                                                                    echo "<span class='label label-success'>Opened</span>";
                                                                }elseif($status==2){
                                                                    echo "<span class='label label-danger'>Closed</span>";
                                                                }
                                                        
                                                
                                                ?></span>
                                    </div>
                                    <div class="col-6 m-t-10 m-b-10">
                                        <?php echo $date?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="p-t-20">Question By</h5>
                                <span><?php echo $email; ?></span>
                                <h5 class="m-t-30">Answer By</h5>
                                <span><?php echo "Mufti Taqi Usmani"; ?></span>
                                <br/>
                            </div>
                        </div>
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

