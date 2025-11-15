<?php

include("config.php");
$get_admin_id = $_GET['id'];

$active_qry = "UPDATE `admin` SET `admin_status`=1  WHERE admin_id='$get_admin_id'";

$result = mysqli_query($cn, $active_qry);

if($result){
    session_start();
    $_SESSION['status'] = "Operation Performed Successfully...";
    header("Location:view-admin.php");
    mysqli_close($cn);
}
else{
    $_SESSION['error'] = "Something went wrong Please Check...";
    header("Location:view-admin.php");

    mysqli_close($cn);
}


?>