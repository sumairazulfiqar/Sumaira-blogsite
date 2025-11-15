<?php
ob_start();
session_start();
include("config.php");
?>

<html lang="en">

<head>
    <title>Login</title>
    <!-- links -->
    <?php include("./includes/links.php") ?>
      <style>
         body{

 background: #f9efefff ;

    }

    </style>

</head>

<body class="">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <!-------------Form Start ------------->
            <div class="col-md-4 shadow p-4 bg-white mx-auto" style="margin-top: 100px;">
                
                
                <?php if (!empty($_SESSION['error'])) {
                    $msg = $_SESSION['error'];
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='notification-status'>
                                              <strong>danger: </strong> $msg
								              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							             </div>";
                }
                unset($_SESSION['error']); 
                ?>

                <h3 class="text-center">Admin <span class="text-danger">Login</span></h3>

                <form class="row needs-validation" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ?>" novalidate method="post">

                    <div class="mb-3 col-lg-12">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <input type="email" id="email" class="form-control shadow-none border border-danger" placeholder="Enter here..." name="email" required>
                            <div class="invalid-feedback">
                                All Fields are Required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 col-lg-12">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group has-validation">
                            <input type="password" id="password" class="form-control shadow-none border border-danger" placeholder="Enter here..." name="password" required>
                            <div class="invalid-feedback">
                                All Fields are Required.
                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger shadow-none text-white w-50 mx-auto" name="login">Login <i class="fa-solid fa-right-to-bracket"></i></button>
                    </div>
                </form>
            </div>
            <!-------------Form Start ------------->

            <div class="col-md-4"></div>

        </div><!--row-->

    </div><!--container-->

</body>

</html>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<?php


// data fileration function
function filteration($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['login'])) {

    $admin_email = filteration($_POST['email']);
    $admin_password = filteration($_POST['password']);

    // escape data from sql injection
    $admin_email = mysqli_real_escape_string($cn, $admin_email);
    $admin_password = mysqli_real_escape_string($cn, $admin_password);

    // query template
    $query = "SELECT * FROM admin WHERE admin_email = ? AND admin_password = ?";

    // prepare statement
    if ($stmt = mysqli_prepare($cn, $query)) {
        mysqli_stmt_bind_param($stmt, 'ss', $admin_email, $admin_password); //binding parameters to query template
        mysqli_stmt_execute($stmt); // execute the query 
        mysqli_stmt_store_result($stmt); // store the query result

        if (mysqli_stmt_num_rows($stmt) == 1) {
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_password'] = $admin_password;

            header("location:index.php");

        } 
        
        else {
            $_SESSION['error'] =  "Email or Password Invalid";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "SQL Query is not Prepared";
    }
} // end of login button condition

ob_end_flush();

?>

<!-- Remove Notification after 5  sec -->
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#notification-status').fadeOut();
        }, 5000);

    });
</script>