
<?php
session_start();
include('db.php');
    $post_id = $_GET['id'];

                $veh_query = $mysqli->query("UPDATE  brands SET 
                                                            
                                                                status='2'

                                                                WHERE brand_id='$post_id'");
                            
                            if ($veh_query == TRUE) {
                                                          
                                   
                                 ?>
                                 <script>window.location = "../brandrequest.php";</script>
                                 <?php


                                } else {
                                
                                    echo "<script>alert('Error')</script>";
                                                          
                                }
?>