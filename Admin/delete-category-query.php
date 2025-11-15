<?php

include("config.php");
$get_category_id = $_GET['id'];

$delete_query = "DELETE FROM `category` WHERE category_id = '$get_category_id'";
$result = mysqli_query($cn , $delete_query);

if($result){
    session_start();
    $_SESSION['status'] = "Operation Performed Successfully...";
    header("Location:categories.php");
    mysqli_close($cn);
}
else{
    $_SESSION['error'] = "Something went wrong Please Check...";
    header("Location:categories.php");

    mysqli_close($cn);
}



?>