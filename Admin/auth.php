<?php

session_start();
if (!isset($_SESSION['admin_email'])) {
    $_SESSION['error'] =  "Email or Password Invalid";
    header("location:login.php");
    exit();
} else {

    include("config.php");

    $select_query = "SELECT * FROM admin WHERE admin_email = '$_SESSION[admin_email]' AND admin_password = '$_SESSION[admin_password]'";
    $result = mysqli_query($cn, $select_query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_name'] = $row['admin_name'];
        $_SESSION['admin_password'] = $row['admin_password'];
        $_SESSION['joining_date'] = $row['joining_date'];
        $_SESSION['admin_mobile'] = $row['admin_mobile'];
        $_SESSION['admin_country'] = $row['admin_country'];
        $_SESSION['admin_profession'] = $row['admin_profession'];
        $_SESSION['admin_role'] = $row['admin_role'];
        $_SESSION['admin_image'] = $row['admin_image'];
        $_SESSION['admin_about'] = $row['admin_about'];
        $_SESSION['admin_facebook'] = $row['admin_facebook'];
        $_SESSION['admin_twitter'] = $row['admin_twitter'];
        $_SESSION['admin_instagram'] = $row['admin_instagram'];
        $_SESSION['admin_linkedln'] = $row['admin_linkdln'];
        $_SESSION['admin_status'] = $row['admin_status'];
    }
}
