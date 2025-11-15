<?php

include("config.php");

if (isset($_POST['add-admin'])) {

    $admin_name = mysqli_real_escape_string($cn, $_POST['admin_name']);
    $admin_email = mysqli_real_escape_string($cn, $_POST['admin_email']);
    $admin_password = mysqli_real_escape_string($cn, $_POST['admin_password']);
    $joining_date =  $_POST['joining_date'];


    $admin_mobile = mysqli_real_escape_string($cn, $_POST['admin_mobile']);
    $admin_country = mysqli_real_escape_string($cn, $_POST['admin_country']);
    $admin_profession = mysqli_real_escape_string($cn, $_POST['admin_profession']);
    $admin_role = mysqli_real_escape_string($cn, $_POST['admin_role']);
    $about_admin = mysqli_real_escape_string($cn, $_POST['about']);

    $admin_facebook = mysqli_real_escape_string($cn, $_POST['facebook']);
    $admin_twitter =  mysqli_real_escape_string($cn, $_POST['twitter']);
    $admin_instagram = mysqli_real_escape_string($cn, $_POST['instagram']);
    $admin_linkdin = mysqli_real_escape_string($cn, $_POST['linkdin']);

    $admin_img = $_FILES['admin_img'];

    $admin_img_name = $_FILES['admin_img']['name'];
    $admin_img_tmp_name = $_FILES['admin_img']['tmp_name'];


    $img_dir = "uploads/Admin Imgs/$admin_name" . $admin_img_name;

    move_uploaded_file($admin_img_tmp_name, $img_dir);
    // admin status set by default 1
    $admin_status = 1;

    $admin_insert_qry = "INSERT INTO `admin`(`admin_name`, `admin_email`, `admin_password` , `joining_date` , `admin_mobile`, `admin_country`, `admin_profession`, `admin_role`, `admin_image`, `admin_about`, `admin_facebook`, `admin_twitter`, `admin_instagram`, `admin_linkdln`, `admin_status`) 
    VALUES 
    ('$admin_name','$admin_email', '$admin_password' , '$joining_date' ,'$admin_mobile','$admin_country','$admin_profession','$admin_role','$img_dir','$about_admin','$admin_facebook','$admin_twitter','$admin_instagram','$admin_linkdin','$admin_status')";

    $admin_insert_qry_result = mysqli_query($cn, $admin_insert_qry);

    if ($admin_insert_qry_result) {

        session_start();
        $_SESSION['status'] = "Operation Performed Successfully...";
        header("Location:add-admin.php");
        mysqli_close($cn);
    } else {

        $_SESSION['error'] = "Something went wrong Please Check...";
        header("Location:category.php");

        mysqli_close($cn);
    }
}
