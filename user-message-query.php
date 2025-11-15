<?php

include("config.php");

if (isset($_POST['send-message'])) {

    $user_name = mysqli_real_escape_string($cn, $_POST['name']);
    $user_email = mysqli_real_escape_string($cn, $_POST['email']);
    $user_subject = mysqli_real_escape_string($cn, $_POST['subject']);
    $user_msg = mysqli_real_escape_string($cn, $_POST['msg']);

    $user_status = 1;

    $user_insert_qry = "INSERT INTO `users_messages`(`user_name`, `user_email`, `message_subject`, `message`, `user_status`)
     VALUES 
     ('$user_name','$user_email','$user_subject','$user_msg','$user_status')";

    $user_insert_qry_result = mysqli_query($cn, $user_insert_qry);

    if ($user_insert_qry_result) {

        session_start();
        $_SESSION['status'] = "Operation Performed Successfully...";
        header("Location:contact.php");
        mysqli_close($cn);
    } else {

        $_SESSION['error'] = "Something went wrong Please Check...";
        header("Location:contact.php");

        mysqli_close($cn);
    }
}
