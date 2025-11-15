
<?php
include("config.php");

if (isset($_POST['edit-category'])) {
    $category_id = $_POST['category_id'];
    $category_name = mysqli_real_escape_string($cn, $_POST['category_name']);

    //cod for image update
    if (!empty($_FILES['new_category_img']['name'])) {

        // post image move in folder and uploads in database
        $new_category_img =  $_FILES['new_category_img'];

        $img_name = $_FILES['new_category_img']['name'];
        $img_size = $_FILES['new_category_img']['size'];
        $img_type = $_FILES['new_category_img']['type'];
        $img_tmp_name = $_FILES['new_category_img']['tmp_name'];
        //post image because we will send image directory in database
        $category_img = "uploads/Category Imgs/" . $img_name;
        // move in folder function
        move_uploaded_file($img_tmp_name, $category_img);
    } else {
        $category_img = $_POST['old_category_img'];
    }


    $sql = "UPDATE `category` SET `category_name`='$category_name',`category_img`='$category_img' WHERE category_id = '$category_id'";
    $result = mysqli_query($cn, $sql);

    if ($result) {
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

?>