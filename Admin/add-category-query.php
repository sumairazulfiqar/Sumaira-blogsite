<?php


include("config.php");

if (isset($_POST['add-category'])) {

    $category_name = mysqli_real_escape_string($cn, $_POST['category_name']);

    $category_img = $_FILES['category_img'];

    $category_img_name = $_FILES['category_img']['name'];
    $category_img_tmp_name = $_FILES['category_img']['tmp_name'];


    $img_dir = "uploads/Category Imgs/$category_name" . $category_img_name;

    move_uploaded_file($category_img_tmp_name, $img_dir);
    // category status set by default 1
    $category_status = 1;

    $category_insert_qry = "INSERT INTO `category`(`category_name`, `category_img`, `category_status`) 
    VALUES ('$category_name','$img_dir','$category_status')";


    $category_insert_qry_result = mysqli_query($cn, $category_insert_qry);

    if ($category_insert_qry_result) {

        session_start();
        $_SESSION['status'] = "Operation Performed Successfully...";
        header("Location:categories.php");
        mysqli_close($cn);
    } else {

        $_SESSION['error'] = "Something went wrong Please Check...";
        header("Location:categories.php");

        mysqli_close($cn);
    }
}
