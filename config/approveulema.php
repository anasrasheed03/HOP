
<?php
session_start();
include('db.php');
    $post_id = $_GET['id'];

                $veh_query = $mysqli->query("UPDATE  ulema SET 
                                                            
                                                                status='1'

                                                                WHERE ulema_id='$post_id'");
                            
                            if ($veh_query == TRUE) {
                            
                            
                            
                                                            $disply_info="SELECT * FROM ulema WHERE ulema_id=$post_id";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  
                                                                  }
                                        
                                                    $ulkey=$check['ulkey'];

                            
                            $veh_query1 = $mysqli->query("UPDATE  tbl_login SET 
                                                            
                                                                role=4

                                                                WHERE refkey='$ulkey'");
                
                                                          
                                   
                                    ?>
                                 <script>window.location = "../pendingulema.php";</script>
                                 <?php


                                } else {
                                
                                    echo "<script>alert('Error')</script>";
                                                          
                                }
?>