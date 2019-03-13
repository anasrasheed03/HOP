<?php 
$picture=$_SESSION["setpictures"];
$username=$_SESSION["username"];
$email=$_SESSION["setemail"];
?>
<!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- Light Logo icon -->
                            <h1 clas="m-b-20 user-name font-medium">
                            <img src="../../Portal2/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" width="30%" />
                            <span class="logo-text " style="color: white">HPV</span></h1>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
 
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
 
                            <ul class="dropdown-menu"></ul>
 
                        </li>
                        
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->


                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <i class="ti-search font-16"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="img/<?php echo $picture; ?>" alt="userpicture" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="img/<?php echo $picture; ?>" alt="userpicture" class="img-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo $username; ?></h4>
                                        <p class=" m-b-0"><?php echo $email; ?></p>
                                        <p class=" m-b-0"><?php 
                                        if($_SESSION["useraccess"]==1){
                                        echo "Admin";
                                        }elseif($_SESSION["useraccess"]==2){
                                        echo "Brand";
                                        }elseif($_SESSION["useraccess"]==3){
                                        echo "Certification Authority";
                                        }elseif($_SESSION["useraccess"]==4){
                                        echo "Ulema";
                                        }elseif($_SESSION["useraccess"]==5){
                                        echo "User";}?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="profile.php">
                                    <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <?php 
                                if($_SESSION["useraccess"]==2){
                                ?>
                                <a class="dropdown-item" href="viewuser.php?id=<?php echo $_SESSION['uid']; ?>">
                                    <i class="ti-user m-r-5 m-l-5"></i> Brand Profile</a>
                                    <?php
                                }elseif($_SESSION["useraccess"]==3){
                                    ?>
                                <a class="dropdown-item" href="viewuser.php?id=<?php echo $_SESSION['uid']; ?>">
                                    <i class="ti-user m-r-5 m-l-5"></i> Authority Profile</a>
                                    <?php 
                                }
                                    ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 

 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
        
        