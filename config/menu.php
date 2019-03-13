 <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link" href="dashboard.php" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-File-HorizontalText"></i><span class="hide-menu">Brands</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <?php
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 4 && $_SESSION["useraccess"]!= 2 && $_SESSION["useraccess"]!= 6 && $_SESSION["useraccess"]!= 7){
                                ?>
                                <li class="sidebar-item"><a href="addbrand.php" class="sidebar-link"><i class="mdi mdi-email-alert"></i><span class="hide-menu"> Add Brand</span></a></li>
                                <?php
                                }
                                ?>
                                <li class="sidebar-item"><a href="approvedbrands.php" class="sidebar-link"><i class="mdi mdi-email-secure"></i><span class="hide-menu"> Approved Brands</span></a></li>
                                <?php
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 4 && $_SESSION["useraccess"]!= 2){
                                ?>
                                <li class="sidebar-item"><a href="brandrequest.php" class="sidebar-link"><i class="mdi mdi-book-multiple"></i><span class="hide-menu"> Brand Request Pending </span></a></li>
                                <?php
                                }
                                ?>
                                <li class="sidebar-item"><a href="rejectedbrands.php" class="sidebar-link"><i class="mdi mdi-book-plus"></i><span class="hide-menu"> Rejected Brands </span></a></li>
                                
                                
                                </ul>
                        </li>
      
                        <li class="sidebar-item"> <a class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-Box-withFolders"></i><span class="hide-menu">Products </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <?php
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 4 && $_SESSION["useraccess"]!= 6 && $_SESSION["useraccess"]!= 7){
                                ?>
                                
                                <li class="sidebar-item"><a href="addproducts.php" class="sidebar-link"><i class="mdi mdi-email-alert"></i><span class="hide-menu"> Add Products </span></a></li>
                                 <?php
                                }
                                ?>
                                <li class="sidebar-item"><a href="approvedproducts.php" class="sidebar-link"><i class="mdi mdi-email-secure"></i><span class="hide-menu"> Approved products </span></a></li>
                                <?php
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 4 && $_SESSION["useraccess"]!= 7){
                                ?>
                                <li class="sidebar-item"><a href="pendingproducts.php" class="sidebar-link"><i class="mdi mdi-book-multiple"></i><span class="hide-menu"> Pending Products </span></a></li>
                                <?php
                                }
                                ?>
                                <li class="sidebar-item"><a href="rejectedproducts.php" class="sidebar-link"><i class="mdi mdi-book-plus"></i><span class="hide-menu"> Reject Products </span></a></li>
                                
                                </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-Duplicate-Window"></i><span class="hide-menu">Certification Authority </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="viewcert.php" class="sidebar-link"><i class="mdi mdi-toggle-switch"></i><span class="hide-menu"> View Certification Authority</span></a></li>
                                <?php
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 4 && $_SESSION["useraccess"]!= 3 && $_SESSION["useraccess"]!= 2 && $_SESSION["useraccess"]!= 6 && $_SESSION["useraccess"]!= 7){
                                ?>
                                <li class="sidebar-item"><a href="addcert.php" class="sidebar-link"><i class="mdi mdi-tablet"></i><span class="hide-menu"> Add Certification Authority</span></a></li>
                                <?php
                                }
                                ?>
                                </ul>
                                
                        </li>
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-Navigation-LeftWindow"></i><span class="hide-menu">Ulema & Fatwas</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                 <?php
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 4 && $_SESSION["useraccess"]!= 2 && $_SESSION["useraccess"]!= 6 && $_SESSION["useraccess"]!= 7){
                                ?>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="addulema.php" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">Add Ulema</span></a></li>
                    <?php
                                        
                                    }
                    
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 4 && $_SESSION["useraccess"]!= 2 && $_SESSION["useraccess"]!= 6){
                                ?>
                    
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pendingulema.php" aria-expanded="false"><i class="mdi mdi-border-style"></i><span class="hide-menu">Pending Ulema Request</span></a></li>
                                <?php 
                                    }
                                ?>
                                
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ulemalist.php" aria-expanded="false"><i class="mdi mdi-tab-unselected"></i><span class="hide-menu">Ulema List</span></a></li>
                                 <?php
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 2 && $_SESSION["useraccess"]!= 6 && $_SESSION["useraccess"]!= 7){
                                ?>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="addfatwa.php" aria-expanded="false"><i class="mdi mdi-svg"></i><span class="hide-menu"> Add Fatawa</span></a></li>
                                <?php
                                    }
                                ?>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="fatwalist.php" aria-expanded="false"><i class="mdi mdi-chart-histogram"></i><span class="hide-menu"> Fatawa List</span></a></li>
                                
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-File-Hide"></i><span class="hide-menu">Discussion </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <?php
                                    if($_SESSION["useraccess"]!= 5){
                                ?>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ulemabrand.php" aria-expanded="false"><i class="mdi mdi-border-style"></i><span class="hide-menu">Ulema & Brands</span></a></li>
                                
                                <?php 
                                    }
                                ?>
                                <?php
                                    if($_SESSION["useraccess"]== 5 && $_SESSION["useraccess"]== 4){
                                ?>
                                <li class="sidebar-item"><a href="askulema.php" class="sidebar-link"><i class="mdi mdi-crop-free"></i> <span class="hide-menu"> Ask Ulema</span></a>
                                 <?php 
                                    }
                                ?>
                                 <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item"><a href="questionlist.php" class="sidebar-link"><i class="mdi mdi-priority-low"></i><span class="hide-menu"> Asked Questions</span></a></li>
                                        </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-File-Hide"></i><span class="hide-menu">E-Code </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="halal-Ecodes.php" class="sidebar-link"><i class="mdi mdi-account-key"></i><span class="hide-menu"> Halal E-codes </span></a></li>
                                <li class="sidebar-item"><a href="haram-Ecodes.php" class="sidebar-link"><i class="mdi mdi-crop-free"></i> <span class="hide-menu"> Haram E-codes</span></a></li>
                                <?php
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 2 && $_SESSION["useraccess"]!= 4 && $_SESSION["useraccess"]!= 6  && $_SESSION["useraccess"]!= 7 ){
                                ?>
                                <li class="sidebar-item"><a href="add-ecodes.php" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Add E-codes</span></a></li>
                                
                                <?php 
                                    }
                                ?>

                            </ul>
                        </li>
                        <?php
                                    if($_SESSION["useraccess"]!= 5 && $_SESSION["useraccess"]!= 2 && $_SESSION["useraccess"]!= 4 && $_SESSION["useraccess"]!= 6 && $_SESSION["useraccess"]!= 7 ){
                                ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-File-Hide"></i><span class="hide-menu">Enquiries </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="brand-complaints.php" class="sidebar-link"><i class="mdi mdi-account-key"></i><span class="hide-menu"> Brand Complaints </span></a></li>
                                <li class="sidebar-item"><a href="product-complaints.php" class="sidebar-link"><i class="mdi mdi-crop-free"></i> <span class="hide-menu"> Product Complaints</span></a></li>
                                
                                <li class="sidebar-item"><a href="contact-enquiries.php" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Contact Enquiries</span></a></li>
                                
                                <?php 
                                    }
                                ?>

                            </ul>
                        </li>
                        <?php
                                    if($_SESSION["useraccess"]== 1){
                                ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-Increase-Inedit"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                
                                
                                <li class="sidebar-item"><a href="viewusers.php" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> View Users</span></a></li></ul>
                                <?php 
                                    }
                                ?>
                                </ul>
                        </li>
                        

                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
       