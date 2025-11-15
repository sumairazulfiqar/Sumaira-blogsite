
<?php
include("config.php");  

if(isset($_POST['edit-admin'])){
    $admin_id = $_POST['admin_id'];
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

   
        //cod for image update
        if(empty($_FILES['new_admin_img']['name'])){
            $admin_img = $_FILES['old_admin_img'];
        }
           else{
              // post image move in folder and uploads in database
              $new_admin_img =  $_FILES['new_admin_img'];
           
              $img_name = $_FILES['new_admin_img']['name'];
              $img_size = $_FILES['new_admin_img']['size'];
              $img_type = $_FILES['new_admin_img']['type'];
              $img_tmp_name = $_FILES['new_admin_img']['tmp_name'];
              //post image because we will send image directory in database
              $admin_img = "uploads/Admin Imgs/" . $img_name;
              // move in folder function
              move_uploaded_file($img_tmp_name, $admin_img);
           }


    $sql = "UPDATE `admin` SET `admin_name`='$admin_name',`admin_email`='$admin_email',`admin_password`='$admin_password',`joining_date`='$joining_date',`admin_mobile`='$admin_mobile',`admin_country`='$admin_country',`admin_profession`='$admin_profession',`admin_role`='$admin_role',`admin_image`='$admin_img',`admin_about`='$about_admin',`admin_facebook`='$admin_facebook',`admin_twitter`='$admin_twitter',`admin_instagram`='$admin_instagram',`admin_linkdln`='$admin_linkdin' WHERE admin_id = '$admin_id'" ;
    $result = mysqli_query($cn , $sql);

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


}


?>