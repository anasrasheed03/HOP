
<?php
include "QrLib/qrlib.php";
include('db.php');
    $post_id = $_GET['id'];

                $veh_query = $mysqli->query("UPDATE  products SET 
                                                            
                                                                status='1'
                                                                WHERE product_id='$post_id'");
                            
                            if ($veh_query == TRUE) {
                                
                                
                                
                                
                                
                                
                                
                                
                                $disply_info="SELECT * FROM products WHERE product_id=$post_id";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  
                                                                  }
                                        
                                                    $product=$check['product_name'];
                                                    $qrImgName = "product".rand();
                                                    
                                                    
                                                    $final= $product;
                                                    $qrs = QRcode::png($final,"ProdQr/$qrImgName.png","H","3","3");
                                                    $qrimage = $qrImgName.".png";
                                                    $workDir = $_SERVER['HTTP_HOST'];
                                                    $qrlink = $workDir."Portal2/config/ProdQr/".$qrImgName.".png";
                                                    




                $veh_query = $mysqli->query("UPDATE  products SET 
                                                            
                                                                qrContent='$final',
                                                                qrImg='$qrimage',
                                                                qrlink='$qrlink'
                                                                

                                                                WHERE product_id='$post_id'");
                            
                            if ($veh_query == TRUE) {
                                                          
                                 ?>
                                 <script>alert('Qr Code has been generated.');</script>
                                 <?php
                            

                                } else {
                                
                                    echo "error".mysqli_error($veh_query);
                                                          
                                }
                                
                                
                                
                                
                                
                                
                                
                                
                                                          
                                 ?>
                                 <script>window.location = "../pendingproducts.php";</script>
                                 <?php
                            

                                } else {
                                
                                    echo "error".mysqli_error($veh_query);
                                                          
                                }
?>