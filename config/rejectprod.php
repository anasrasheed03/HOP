
<?php
session_start();
include('db.php');
    $post_id = $_GET['id'];

                $veh_query = $mysqli->query("UPDATE  products SET 
                                                            
                                                                status='2'

                                                                WHERE product_id='$post_id'");
                            
                            if ($veh_query == TRUE) {
                                                          
                                   
                                ?>
                                 <script>window.location = "../pendingproducts.php";</script>
                                 <?php


                                } else {
                                
                                    echo "<script>alert('Error')</script>";
                                                          
                                }
?>