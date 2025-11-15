
<?php

session_start();

include("config.php"); //Database Connectivity

// Registration Form Code
if (isset($_POST['register'])) {

    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];


    $exist_email_query = "SELECT * FROM users WHERE user_email = '$user_email' ";
    $result = mysqli_query($cn, $exist_email_query);

    if ($result) // Run if Query is Successfully Executed.....
    {
        if (mysqli_num_rows($result) > 0) // Run if Email is already registered.....
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_email'] == $user_email) {
                echo "
            <script>
              alert('Email is Already Exist');
              window.location.href='index.php';
            </script>
            ";
            }
        }

        // Run if Email is not registered.....
        else {
            $insert_query = "INSERT INTO `users`( `user_name`, `user_email`, `user_password`) VALUES ('$user_name','$user_email','$user_password')";
            $inserted_result = mysqli_query($cn, $insert_query);

            // Run if Query is Successfuly Executed.....
            if ($inserted_result) {
                echo "
            <script>
              alert('Registration Successfully');
              window.location.href='index.php';
            </script>
            ";
            }

            // Run if Query is Not Executed.....
            else {
                echo "
            <script>
              alert('Cannot Run Query');
              window.location.href='index.php';
            </script>
            ";
            }
        }
    }

    // Run if Query is Not Executed.....
    else {
        echo "
     <script>
       alert('Query is not Run Successfully')
       window.location.href='index.php'
    </script> 
     ";
    }
}



// --------------------Login Form Code---------------------------

if(isset($_POST['login'])){

    $log_password = $_POST['log_password'];
    $log_email = $_POST['log_email'];

    $query = "SELECT * FROM users WHERE user_email='$log_email' ";
    $query_result = mysqli_query($cn,$query);

    if($query_result){
      if(mysqli_num_rows($query_result)==1){
        $row=mysqli_fetch_assoc($query_result);

        if($log_password==$row['user_password']){
        
          $_SESSION['login'] = true;
          $_SESSION['username']=  $row['user_name'];

          header("Location:index.php");
          
        }
        else{
          echo "
          <script>
            alert('Password is Inncorrect')
             window.location.href='index.php'
         </script> 
          ";
        }
      }
      else{
        echo "
        <script>
          alert('Email is not registered')
           window.location.href='index.php'
       </script> 
        ";
      }

    }
else{
  echo "
  <script>
    alert('Query is not Run Successfully')
    window.location.href='index.php'
 </script> 
  ";
}
}

?>