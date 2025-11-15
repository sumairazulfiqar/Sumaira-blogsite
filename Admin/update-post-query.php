
<?php
include("config.php");

if (isset($_POST['edit-post'])) {
    $post_id = $_POST['post_id'];
    $post_title = mysqli_real_escape_string($cn, $_POST['post_title']);
    $post_category = mysqli_real_escape_string($cn, $_POST['post_category']);
    $post_description = mysqli_real_escape_string($cn, $_POST['post_description']);

    if (!empty($_FILES['new_post_img']['name'])) {
        // Process the new image
        $new_post_img =  $_FILES['new_post_img'];

        $img_name = $_FILES['new_post_img']['name'];
        $img_size = $_FILES['new_post_img']['size'];
        $img_type = $_FILES['new_post_img']['type'];
        $img_tmp_name = $_FILES['new_post_img']['tmp_name'];
        //post image because we will send image directory in database
        $post_image = "uploads/Post Imgs/" . $img_name;
        // move in folder function
        move_uploaded_file($img_tmp_name, $post_image);
    } else {
        // Use the old image if no new image is provided
        $post_image = $_POST['old_post_img'];
    }

    $sql = "UPDATE `posts` SET `post_title`='$post_title',`post_category`='$post_category',`post_image`='$post_image',`post_description`='$post_description' WHERE `post_id` = '$post_id'";
    $result = mysqli_query($cn, $sql);

    if ($result) {
        session_start();
        $_SESSION['status'] = "Operation Performed Successfully...";
        header("Location:view-posts.php");
        mysqli_close($cn);
    } else {
        $_SESSION['error'] = "Something went wrong Please Check...";
        header("Location:view-posts.php");

        mysqli_close($cn);
    }
}

?>