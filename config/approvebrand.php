
<?php
session_start();
include('db.php');
    $post_id = $_GET['id'];

                $veh_query = $mysqli->query("UPDATE  brands SET 
                                                            
                                                                status='1'

                                                                WHERE brand_id='$post_id'");
                            
                            if ($veh_query == TRUE) {
                            
                            
                            
                                                            $disply_info="SELECT * FROM brands WHERE brand_id=$post_id";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  
                                                                  }
                                        
                                                    $brkey=$check['brkey'];

                            
                            $veh_query1 = $mysqli->query("UPDATE  tbl_login SET 
                                                            
                                                                role=2

                                                                WHERE refkey='$brkey'");
                
                                                          
                                   
                                    ?>
                                 <script>window.location = "../brandrequest.php";</script>
                                 <?php


                                } else {
                                
                                    echo "<script>alert('Error')</script>";
                                                          
                                }
?>