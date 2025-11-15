<?php
session_start();
include("config.php");

if (isset($_POST['add-post'])) {

    $post_title = mysqli_real_escape_string($cn, $_POST['post_title']);
    $post_category = mysqli_real_escape_string($cn, $_POST['post_category']);
    $post_date = date('Y-m-d');
    $post_author = $_SESSION['admin_id'];
    $post_description = mysqli_real_escape_string($cn, $_POST['post_description']);

    $post_img = $_FILES['post_img'];
    $post_img_name = $_FILES['post_img']['name'];
    $post_img_tmp_name = $_FILES['post_img']['tmp_name'];

    $img_dir = "uploads/Post Imgs/$post_name" . $post_img_name;

    move_uploaded_file($post_img_tmp_name, $img_dir);
    // post status set by default 1
    $post_status = 1;

    $post_insert_qry = "INSERT INTO `posts`(`post_title`, `post_category`, `post_image`, `post_date`, `post_author`,`post_description`, `post_status`) 
    VALUES 
    ('$post_title','$post_category','$img_dir','$post_date','$post_author','$post_description','$post_status')";

    $post_insert_qry_result = mysqli_query($cn, $post_insert_qry);

    if ($post_insert_qry_result) {

        session_start();
        $_SESSION['status'] = "Operation Performed Successfully...";
        header("Location:add-post.php");
        mysqli_close($cn);
    } else {

        $_SESSION['error'] = "Something went wrong Please Check...";
        header("Location:add-post.php");

        mysqli_close($cn);
    }
}
