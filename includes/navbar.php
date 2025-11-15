<?php
session_start();
include("config.php"); //Database Connectivity
?>

<div class="bg-danger px-4 py-2 d-flex justify-content-between">
    <div class="fs-4">
        <a href="" class="text-white"> <i class="fa-brands fa-square-facebook me-2"></i></a>
        <a href="" class="text-white"> <i class="fa-brands fa-square-instagram me-2"></i></a>
        <a href="" class="text-white"><i class="fa-brands fa-square-twitter me-2"></i></a>
        <a href="" class="text-white"> <i class="fa-brands fa-linkedin me-2"></i></a>
    </div>
    <div>
        <form method="post" action="search.php" class="d-flex">
            <input class="form-control form-control-sm me-1 shadow-none border border-danger" type="search" placeholder="Search here..." name="search">
            <button class="btn btn-outline-light btn-sm  shadow-none" name="search_btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

        </form>
    </div>
</div>


<?php
// to get site name and logo from database
include("config.php");

$name_select_qry = "SELECT * FROM `site_name`";
$name_select_qry_result = mysqli_query($cn, $name_select_qry);
if (mysqli_num_rows($name_select_qry_result) > 0) {

    $row = mysqli_fetch_assoc($name_select_qry_result);
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white px-3 sticky-top shadow shadow-sm" style="z-index: 100;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <h3 class="m-0"><img src="./Admin/<?php echo $row['site_logo'] ?>" class='me-1' height='40px' width='40px' alt="Site Logo"> <?php echo $row['site_name'] ?></span></h2>
        </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categories.php">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="faq.php">FAQ's</a>
                </li>
            </ul>


            <!-- Session for login logout -->

            <?php

            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                echo "
                <div class=' d-flex ' style='align-items:center;'>
            <span class='border border-danger rounded-pill p-1 px-2 text-center fw-bold'> <span class='text-danger '> Hello! </span> $_SESSION[username] </span>  <a href='logout.php' class='btn btn-danger btn-sm shadow-none text-white mx-3' type='submit' name='login'>Logout <i class='fa-solid fa-right-from-bracket'></i></a>
            </div>
            ";
            } else {
                echo '
            <div class="d-flex">
            <button class="btn btn-danger btn-sm me-2 text-white shadow-none" type="submit"   data-bs-toggle="modal"  data-bs-target="#loginModal">Login <i class="fa-solid fa-right-to-bracket"></i></button>
            <button class="btn btn-danger btn-sm  text-white shadow-none" type="submit"  data-bs-toggle="modal" data-bs-target="#registerModal">Register <i class="fa-solid fa-user-plus"></i></button>
            </div>
            ';
            }
            ?>

        </div>
    </div>
</nav>


<!--------------- Login Modal Start ---------------------->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login <span class="text-danger">Now</span></h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form method="post" action="auth.php" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm shadow-none" name="log_email" required>
                        <div class="invalid-feedback">
                            Please Enter Your Email.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-sm shadow-none" name="log_password">
                        <div class="invalid-feedback">
                            Please Enter Your Password.
                        </div>
                    </div>

                    <div class="text-center ">
                        <button type="submit" name="login" class="btn btn-danger w-50 text-white"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!--------------- Login Modal End ---------------------->



<!--------------- Register Modal Start ---------------------->

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title">Register <span class="text-danger">Now</span></h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="auth.php" class="needs-validation" novalidate>

                    <div class="col-lg mb-3">
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-sm shadow-none" placeholder="Enter here..." id="name" name="name" required>
                            <div class="invalid-feedback">
                                Please Enter Your Name.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm shadow-none" placeholder="Enter here..." autocomplete="off" name="email" required>
                        <div class="invalid-feedback">
                            Please Enter Your Email.
                        </div>
                    </div>

                    <div class="col-lg mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control form-control-sm shadow-none" placeholder="Enter here..." name="password">
                        <div class="invalid-feedback">
                            Please Enter Your Password.
                        </div>
                    </div>

                    <div class="text-center ">
                        <button type="submit" name="register" class="btn btn-danger w-50 text-white"><i class="fa-solid fa-user-plus"></i> Register </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<!--------------- Register Modal End ---------------------->


<script>
    // Form Validation of Bootstrap
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