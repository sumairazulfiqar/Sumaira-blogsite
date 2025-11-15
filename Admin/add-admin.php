<?php  include("auth.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Admin</title>
    <!-- links --><?php include("./includes/links.php") ?>
       <style>
         body{

 background: #f9efefff ;

    }

    </style>
</head>

<body class="">

    <div class="main-container d-flex">

        <!-- sidebar -->
        <?php include("./includes/sidebar.php") ?>

        <div class="content" id="content">
            <!-- navbar -->
            <?php include("./includes/navbar.php") ?>

            <div class="p-3">
                <nav class="bg-dark" aria-label="breadcrumb">
                    <ol class="breadcrumb d-flex align-items-center p-2">
                        <li class="me-3" aria-current="page"> <a class="text-decoration-none text-danger"><i class="bi bi-plus"></i> Add Admin </a></li>
                        <li aria-current="page"> <a href="view-admin.php" class="text-decoration-none text-white"><i class="bi bi-eye-fill"></i> View Admin </a></li>
                    </ol>
                </nav>


                <div class="card mb-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3">

                                <h5><i class="fa fa-plus"></i> Add <span class="text-danger">Admin</span></h5>
                            </div>

                            <!--empty col -->
                            <div class="col-lg-1"></div>

                            <div class="col-lg-8">
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

                        <div class="w-100 my-3" style="height: 1px; background: lightgray"></div>

                        <form action="add-admin-query.php" method="post" enctype="multipart/form-data" class="row needs-validation" novalidate>

                            <div class="col-lg-4 p-2 px-3">
                                <label for="admin-name" class="form-label">Full Name</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" id="admin-name" placeholder="Enter here..." onkeyup="this.value = this.value.toUpperCase();" name="admin_name" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 p-2 px-3">
                                <label for="admin-email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <input type="email" class="form-control shadow-none border border-danger" id="admin-email" placeholder="Enter here..." name="admin_email" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 p-2 px-3">
                                <label for="admin-password" class="form-label">Password</label>
                                <div class="input-group has-validation">
                                    <input type="password" class="form-control shadow-none border border-danger" id="admin-password" placeholder="Enter here..." name="admin_password" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 p-2 px-3">
                                <label for="date" class="form-label">Date of Joining</label>
                                <div class="input-group has-validation">
                                    <input type="date" class="form-control shadow-none border border-danger" id="joining_date" placeholder="Enter here..." name="joining_date" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 p-2 px-3">
                                <label for="admin-mobile" class="form-label">Mobile</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" autocomplete="off" data-inputmask="'mask':'9999-9999999'" placeholder="xxxx-xxxxxxx" id="admin-mobile" name="admin_mobile" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 p-2 px-3">
                                <label for="admin-country" class="form-label">Country</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" id="admin-country" onkeyup="this.value = this.value.toUpperCase();" placeholder="Enter here..." name="admin_country" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 p-2 px-3">
                                <label for="admin-profession" class="form-label">Profession</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" id="admin-profession" placeholder="Enter here..." onkeyup="this.value = this.value.toUpperCase();" name="admin_profession" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 p-2 px-3">
                                <label for="admin-role" class="form-label">Role</label>
                                <select class="form-select shadow-none border border-danger" id="admin-role" name="admin_role">
                                    <option selected value="-1" disabled>Choose here...</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Super Admin</option>
                                </select>
                            </div>


                            <div class="col-lg-4 p-2 px-3">
                                <label for="admin-img" class="form-label">Profile Image</label>
                                <div class="input-group has-validation">
                                    <input type="file" class="form-control shadow-none border border-danger" id="admin-img" placeholder="Enter here..." name="admin_img" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label for="about" class="form-label">About</label>
                                <textarea class="form-control shadow-none border border-danger py-1" id="about" placeholder="Write shortly about yourself..." name="about" required></textarea>
                                <div class="invalid-feedback">
                                    All Fields are Required.
                                </div>
                            </div>


                            <h5 class="my-2"><i class="fa-solid fa-people-arrows"></i> Social <span class="text-danger">Links</span></h5>


                            <div class="col-lg-3 p-2 px-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" id="facebook" placeholder="Enter here..." name="facebook">
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 p-2 px-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" id="twitter" placeholder="Enter here..." name="twitter">
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 p-2 px-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" id="instagram" placeholder="Enter here..." name="instagram">
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 p-2 px-3">
                                <label for="linkdin" class="form-label">Linkdln</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" id="linkdin" placeholder="Enter here..." name="linkdin">
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="w-100 mt-2" style="height: 1px; background: lightgray"></div>


                            <div class="col-lg-12">
                                <label class="form-label"></label>
                                <div class="d-flex justify-content-end">

                                    <button type="reset" class="btn btn-danger text-white shadow-none me-3"><i class="bi bi-arrow-repeat"></i> Reset</button>
                                    <button type="submit" class="btn btn-danger text-white shadow-none" name="add-admin"><i class="bi bi-person-plus-fill"></i> Add Admin</button>

                                </div>
                            </div>

                        </form>


                    </div>
                </div>
                <!-- form-card -->

            </div><!--content-->
        </div><!--main-container-->
</body>

</html>

<!-- Input Masking -->
<script src="./Assets/masking/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();


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