<?php

include('db.php');


if (isset($_POST["username"]))
{
    $username = mysqli_real_escape_string($mysqli, $_POST["username"]);
    $sql12 = "select loginid from tbl_login where loginid='$username' AND status=0";
    $result = mysqli_query($mysqli, $sql12);
    echo mysqli_num_rows($result);
}
?>