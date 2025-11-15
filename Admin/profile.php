<?php  include("auth.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- links -->
    <?php include("./includes/links.php") ?>
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
                        <li class="me-3 text-white" aria-current="page"> <a href="add-admin.php" class="text-decoration-none text-white"><i class="bi bi-plus"></i> Add Admin </a></li>
                        <li class="me-3" aria-current="page"> <a href="view-admin.php" class="text-decoration-none text-white"><i class="bi bi-eye-fill"></i> View Admin </a></li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
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
                <ul class="nav nav-tabs my-3">
                    <li class="nav-item">
                        <a class="nav-link active text-danger" data-bs-toggle="tab" data-bs-target="#profile-details" href="#profile-details"><i class="bi bi-person-fill"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" data-bs-toggle="tab" data-bs-target="#edit-profile" href="#edit-profile"><i class="bi bi-pencil-square"></i> Edit Profile</a>
                    </li>
                </ul>

                <div class="row">

                    <div class="col-lg-4 col-sm-12 mb-3">
                        <div class="card p-2 border-0 shadow">

                            <div class="text-center p-3">
                                <img src="<?php  echo $_SESSION['admin_image'] ?>" class="img-thumbnail rounded-circle" height="120px" width="120px" alt="">
                                <h6 class="my-1"><?php  echo $_SESSION['admin_name'] ?></h6>
                                <h6 class="text-danger"><?php  echo $_SESSION['admin_profession'] ?></h6>
                                <div class="fs-3">
                                    <a href="" class="text-dark"> <i class="fa-brands fa-square-facebook me-2"></i></a>
                                    <a href="" class="text-danger"> <i class="fa-brands fa-square-instagram me-2"></i></a>
                                    <a href="" class="text-dark"><i class="fa-brands fa-square-twitter me-2"></i></a>
                                    <a href="" class="text-danger"> <i class="fa-brands fa-linkedin me-2"></i></a>
                                </div>
                            </div>

                        </div>
                    </div><!--col-->



                    <div class="col-lg-8 col-sm-12">
                        <div class="card border-0 shadow">

                            <div class="tab-content">
                                <div class="tab-pane p-2 active" id="profile-details">

                                    <h5 class="card-header bg-white mb-3">Admin <span class="text-danger">Details</span> </h5>

                                    <div class="row px-2 text-center">
                                        <div class="col-lg-4 col-sm-6 mb-2">
                                            <h6 class="text-danger">E-mail <i class="bi bi-envelope-fill"></i></h6>
                                            <h6><?php echo $_SESSION['admin_email']  ?></h6>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 mb-2">
                                            <h6 class="text-danger">Mobile <i class="bi bi-tablet-fill"></i></h6>
                                            <h6><?php echo $_SESSION['admin_mobile']  ?></h6>
                                        </div>


                                        <div class="col-lg-2 col-sm-6 mb-2">
                                            <h6 class="text-danger">Country <i class="bi bi-flag-fill"></i></h6>
                                            <h6><?php echo $_SESSION['admin_country']  ?></h6>
                                        </div>


                                        <div class="col-lg-3 col-sm-6 mb-2">
                                            <h6 class="text-danger">Role <i class="bi bi-person-video"></i></h6>
                                            <h6>
                                            
                                            <?php if ($_SESSION['admin_role'] == 0) {
                                                echo "User";
                                            } elseif ($_SESSION['admin_role'] == 1) {
                                                echo "Admin";
                                            } else {
                                                echo "Super Admin";
                                            }

                                            ?></h6>
                                        </div>
                                    </div>




                                    <div class="my-2 px-2">
                                        <h5 class="card-title">About <span class="text-danger">Admin</span></h5>
                                        <p class=""><?php  echo $_SESSION['admin_about'] ?></p>
                                    </div>



                                </div>
                                <!-- edit profile -->
                                <div class="tab-pane fade p-3" id="edit-profile">
                                    <form action='edit-profile.php' method='post' enctype='multipart/form-data'>
                                        <input type="hidden" name='admin_id' value="<?php echo $_SESSION['admin_id']  ?>">
                                        <div class="row">
                                            <div class="col-lg-12 text-end">
                                                <img src="<?php echo $_SESSION['admin_image']  ?>" class='img-thumbnail' width='100px' height='100px' alt="Profile">
                                                <div class=" text-start">
                                               
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="fullName" class="form-label">Name</label>
                                                <input name="admin_name" type="text" class="form-control form-control-sm shadow-none border border-danger" onkeyup="this.value = this.value.toUpperCase();" id="fullName" value="<?php echo $_SESSION['admin_name']  ?>">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label for="Phone" class="form-label">Mobile</label>
                                                <input name="admin_mobile" type="text" class="form-control form-control-sm shadow-none border border-danger" data-inputmask="'mask':'9999-9999999'" id="Phone" value="<?php echo $_SESSION['admin_mobile']  ?>">
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="Email" class="form-label">Email</label>
                                                <input name="admin_email" type="email" class="form-control form-control-sm shadow-none border border-danger" id="Email" value="<?php echo $_SESSION['admin_email']  ?>" readonly>
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label for="Country" class="form-label">Country</label>
                                                <input name="admin_country" type="text" onkeyup="this.value = this.value.toUpperCase();" class="form-control form-control-sm shadow-none border border-danger" id="Country" value="<?php echo $_SESSION['admin_country']  ?>">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="profession" class="form-label">Profession</label>
                                                <input name="admin_profession" onkeyup="this.value = this.value.toUpperCase();" type="text" class="form-control form-control-sm shadow-none border border-danger" id="Email" value="<?php echo $_SESSION['admin_profession']  ?>">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Profile Image</label>
                                                <input type="file" class="form-control form-control-sm shadow-none border border-danger"  name="new_admin_img">
                                                <input type="hidden" class="form-control shadow-none" value='<?php echo $_SESSION['admin_image']  ?>' name="old_admin_img">
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="Twitter" class="form-label">Twitter Profile</label>
                                                <input name="twitter" type="text" class="form-control form-control-sm shadow-none border border-danger" id="Twitter" value="<?php echo $_SESSION['admin_twitter']  ?>">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="Facebook" class="form-label">Facebook Profile</label>
                                                <input name="facebook" type="text" class="form-control form-control-sm shadow-none border border-danger" id="Facebook" value="<?php echo $_SESSION['admin_facebook']  ?>">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="Instagram" class="form-label">Instagram Profile</label>
                                                <input name="instagram" type="text" class="form-control form-control-sm shadow-none border border-danger" id="Instagram" value="<?php echo $_SESSION['admin_instagram'] ?>">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label for="Linkedin" class="form-label">Linkedin Profile</label>
                                                <input name="linkedin" type="text" class="form-control form-control-sm shadow-none border border-danger" id="Linkedin" value="<?php echo $_SESSION['admin_linkedln']  ?>">
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="about" class="form-label">About</label>
                                                <textarea name="about" class="form-control form-control-sm shadow-none border border-danger" id="about" style="height: 100px"><?php echo $_SESSION['admin_about']  ?></textarea>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name='edit-profile' class="btn btn-danger text-white"><i class="fa-solid fa-retweet"></i> Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>



                            </div>

                        </div>
                    </div><!--col-->


                </div>



            </div>


        </div><!--content-->
    </div><!--main-container-->

</body>

</html>


<!-- Input Masking -->
<script src="./Assets/masking/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();
</script>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#notification-status').fadeOut();
        }, 5000);

    });
</script>