<?php  
    date_default_timezone_set("Asia/Karachi");
    $dbhost = 'localhost';
    $dbuser = 'maknam_anas';
    $dbpass = 'Racespeed@#!@';
    $dbname = 'maknam_halal_product';

    //Connect
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if (mysqli_connect_errno()) {
        printf("MySQLi connection failed: ".error($mysqli));
        exit();
    }

    // Change character set to utf8
    if (!$mysqli->set_charset('utf8')) {
        printf('Error loading character set utf8: %s\n', $mysqli>error);
        
    }

?>