
<?php
include("config.php");  

if(isset($_POST['edit-name'])){
    $name = mysqli_real_escape_string($cn, $_POST['site_name']);

        //cod for image update
        if(!empty($_FILES['new_site_img']['name'])){

            // post image move in folder and uploads in database
            $new_site_img =  $_FILES['new_site_img'];

            $img_name = $_FILES['new_site_img']['name'];
            $img_size = $_FILES['new_site_img']['size'];
            $img_type = $_FILES['new_site_img']['type'];
            $img_tmp_name = $_FILES['new_site_img']['tmp_name'];
            //post image because we will send image directory in database

            $site_img = "uploads/Site Logo/" . $img_name;
            // move in folder function
            move_uploaded_file($img_tmp_name, $site_img);
            
        }
           else{
            $site_img = $_POST['old_site_img'];
           }


        $sql = "UPDATE `site_name` SET `site_name`='$name',`site_logo`='$site_img'" ;
        $result = mysqli_query($cn , $sql);

        if($result){
            session_start();
            $_SESSION['status'] = "Operation Performed Successfully...";
            header("Location:setting.php");
            mysqli_close($cn);
        }
        else{
            $_SESSION['error'] = "Something went wrong Please Check...";
            header("Location:setting.php");

            mysqli_close($cn);
        }
    }

?>