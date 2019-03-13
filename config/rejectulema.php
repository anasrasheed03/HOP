
<?php
session_start();
include('db.php');
    $post_id = $_GET['id'];

                $veh_query = $mysqli->query("UPDATE  ulema SET 
                                                            
                                                                status='2'

                                                                WHERE ulema_id='$post_id'");
                            
                            if ($veh_query == TRUE) {
                                                          
                                   
                                 ?>
                                 <script>window.location = "../pendingulema.php";</script>
                                 <?php


                                } else {
                                
                                    echo "<script>alert('Error')</script>";
                                                          
                                }
?>