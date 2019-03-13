<?php

$to='syed-anas@hotmail.my';
            $msg= "Thanks for new Registration.";   
            $subject="Email Verification";
            $headers .= "MIME-Version: 1.0"."\r\n";
                    
                    $headers= "From:Halal o Product Verifier <contact@halaloproduct.pk>"."\r\n";
                    
            $ms.="<html></body><div><div>Dear $brand_manager,</div></br></br>";
            $ms.="<div style='padding-top:8px;'>Your account information is successfully created in our portal, Please click the following link For verifying and activate your account.</div>
            <div style='padding-top:10px;'><a href='http://fuck.softnowsolutions.com/Portal2/register.php?ref=123123123'>Click Here</a></div>
            <div style='padding-top:4px;'> powered by <a href='halaloproduct.pk'>Halaloproduct.pk</a></div></div>
            </body></html>";
            mail($to,$subject,$ms,$headers);
                            

?>