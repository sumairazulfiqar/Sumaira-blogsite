<?php
session_start();
include("config.php");

if (isset($_POST['add-question'])) {

    $question = mysqli_real_escape_string($cn, $_POST['question']);
    $answer = mysqli_real_escape_string($cn, $_POST['answer']);



    $question_insert_qry = "INSERT INTO `faq`(`question`, `answer`)  VALUES  ('$question' , '$answer')";

    $question_insert_qry_result = mysqli_query($cn, $question_insert_qry);

    if ($question_insert_qry_result) {

        session_start();
        $_SESSION['status'] = "Operation Performed Successfully...";
        header("Location:faq.php");
        mysqli_close($cn);
    } else {

        $_SESSION['error'] = "Something went wrong Please Check...";
        header("Location:faq.php");

        mysqli_close($cn);
    }
}
