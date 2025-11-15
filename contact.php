<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <!--Links--><?php include("./includes/links.php")  ?>
    <style>
        .move {
            transition: all 0.3s;
        }

        .move:hover {
            transform: scale(1.1);
        }

        .h-line {
            max-width: 100px;
            height: 2px;
            background: #dc3545;
            margin: 15px auto;
            margin-top: -10px;
        }


          
         body{

 background: #f9efefff ;

    }

    
    </style>

</head>

<body class="">
    <!-- Navbar--><?php include("./includes/navbar.php")  ?>



    <div class="container mb-3">
        <div class="col-lg-12 p-3">
            <?php
            if (!empty($_SESSION['status'])) {
                $msg = $_SESSION['status'];
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert' id='notification-status'>
                                           <strong>Congratulations: </strong> $msg
								           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							             </div>";
            }
            unset($_SESSION['status']);

            if (!empty($_SESSION['error'])) {
                $msg = $_SESSION['error'];
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='notification-status'>
                                              <strong>danger: </strong> $msg
								              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							             </div>";
            }
            unset($_SESSION['error']);
            ?>
        </div>
    </div>

    <h3 class="text-center my-3 h5 fs-3 m-0">CONTACT <span class="text-danger">US</span></h3>
    <div class="h-line"></div>


    <!-- main conatiner start -->
    <div class="container my-3">


        <?php
        // to get contact info from the database
        require("./config.php");
        $contact_select_qry = "SELECT * FROM `contact_info`";
        $contact_select_qry_result = mysqli_query($cn, $contact_select_qry);
        if (mysqli_num_rows($contact_select_qry_result) > 0) {

            $row2 = mysqli_fetch_assoc($contact_select_qry_result);
        }

        ?>

        <div class="row mx-auto my-2">
            <div class="col-lg-4 mb-3">
                <div class="card shadow p-4 move border-0 w-100" style="width: 18rem;">
                    <i class="fa-solid fa-phone fs-1 text-danger"></i>
                    <p class="text-center mt-3 fs-4"><?php echo $row2['contact_mobile']  ?></p>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card shadow p-4 move border-0 w-100" style="width: 18rem;">
                    <i class="fa-solid fa-envelope text-danger fs-1"></i>
                    <p class="text-center mt-3 fs-4"><?php echo $row2['contact_email']  ?></p>
                </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="card shadow p-3 move border-0 w-100" style="width: 18rem;">
                    <i class="fa-solid fa-location-dot fs-1 text-danger"></i>
                    <p class="text-center mt-3 fs-5"><?php echo $row2['contact_address']  ?></p>
                </div>
            </div>

        </div>


        <!-- contact form -->
        <form class="needs-validation mx-3" method='post' action='user-message-query.php' novalidate>
            <h3 class="text-center my-4 h5 fs-3 m-0">GET IN <span class="text-danger">TOUCH</span></h3>
            <div class="h-line"></div>

            <div class="row shadow p-3 bg-white ">

                <div class="col-lg-6 p-2">
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control border border-danger shadow-none" placeholder="Enter here..." name="name" required>
                        <div class="invalid-feedback">
                            Please Enter Your Name.
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-2">
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control border border-danger shadow-none" placeholder="Enter here..." name="email" required>
                        <div class="invalid-feedback">
                            Please Enter Your Email.
                        </div>
                    </div>
                </div>


                <div class="row p-2">
                    <div class="col-lg-12 p-2">
                        <div class="mb-2">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control border border-danger shadow-none" placeholder="Enter here..." name="subject" required>
                            <div class="invalid-feedback">
                                Please Enter Your Subject.
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row p-2">
                    <div class="col-lg-12 p-2">
                        <div class="mb-2">
                            <label for="msg" class="form-label">Message</label>
                            <textarea class="form-control border border-danger shadow-none" name="msg" placeholder="Enter here..." required></textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mb-2 d-grid p-2 d-flex justify-content-center">
                    <button class="btn btn-danger shadow-none  text-white w-25" type="submit" name='send-message'>Send <i class="fa-regular fa-paper-plane"></i></button>
                </div>
        </form>

    </div>
    </form>
    </div>

    </div>


    <?php include("./includes/footer.php")  ?>

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

<!-- Remove Notification after 5  sec -->
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#notification-status').fadeOut();
        }, 5000);

    });
</script>