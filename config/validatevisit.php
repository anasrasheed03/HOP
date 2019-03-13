<?php

include('db.php');


if (isset($_POST["date"]))
{
    $date = mysqli_real_escape_string($mysqli, $_POST["date"]);
    $sql12 = "select date from visits where date='$date'";
    $result = mysqli_query($mysqli, $sql12);
    echo mysqli_num_rows($result);
}
?>