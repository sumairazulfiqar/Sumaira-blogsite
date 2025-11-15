
<?php
include("config.php");  

if(isset($_POST['edit-message'])){
    $user_id = $_POST['user_id'];
    $user_name = mysqli_real_escape_string($cn, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($cn, $_POST['user_email']);
    $message_title = mysqli_real_escape_string($cn, $_POST['message_title']);
    $user_message = mysqli_real_escape_string($cn, $_POST['user_message']);

    $sql = "UPDATE `users_messages` SET `user_name`='$user_name',`user_email`='$user_email',`message_subject`='$message_title',`message`='$user_message' WHERE `user_id` = '$user_id'" ;
    $result = mysqli_query($cn , $sql);

    if($result){
        session_start();
        $_SESSION['status'] = "Operation Performed Successfully...";
        header("Location:user-messages.php");
        mysqli_close($cn);
    }
    else{
        $_SESSION['error'] = "Something went wrong Please Check...";
        header("Location:user-messages.php");

        mysqli_close($cn);
    }

}

?>s