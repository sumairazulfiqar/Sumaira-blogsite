
<?php
include("config.php");

if (isset($_POST['edit-contact'])) {
    $mobile = mysqli_real_escape_string($cn, $_POST['contact_mobile']);
    $email = mysqli_real_escape_string($cn, $_POST['contact_email']);
    $address = mysqli_real_escape_string($cn, $_POST['contact_address']);


    $sql = "UPDATE `contact_info` SET `contact_mobile`='$mobile',`contact_email`='$email' , `contact_address`='$address'";
    $result = mysqli_query($cn, $sql);

    if ($result) {
        session_start();
        $_SESSION['status'] = "Operation Performed Successfully...";
        header("Location:setting.php");
        mysqli_close($cn);
    } else {
        $_SESSION['error'] = "Something went wrong Please Check...";
        header("Location:setting.php");

        mysqli_close($cn);
    }
}

?>