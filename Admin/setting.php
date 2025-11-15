<?php include("auth.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog Site - Settings</title>
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
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
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



                <div class="card mb-3">

                    <?php
                    // to get site name and logo from database
                    include("config.php");

                    $name_select_qry = "SELECT * FROM `site_name`";
                    $name_select_qry_result = mysqli_query($cn, $name_select_qry);
                    if (mysqli_num_rows($name_select_qry_result) > 0) {

                        $row = mysqli_fetch_assoc($name_select_qry_result);
                    }

                    ?>
                    <div class="row p-3">
                        <h5 class='mb-3 ms-1'><i class="fa-solid fa-file-signature text-danger"></i> Site Name </h5>

                        <div class="col-md-6 ">
                            <h6> Name : <span class='text-danger'><?php echo $row['site_name']  ?></span> </h6>
                        </div>

                        <div class="col-md-6">
                            <h6> Logo : <img src="<?php echo $row['site_logo']  ?>" height='40px' width='40px' alt="Site Logo"> </h6>
                        </div>

                        <div class="col-md-6">
                            <button type="button" class='btn btn-danger btn-sm shadow-none text-white' data-bs-toggle="modal" data-bs-target="#edit-name"><i class="fa-solid fa-pen"></i> Edit Site Name</button>
                        </div>

                        <!-- Modal to edit contact info -->
                        <div class="modal fade" id="edit-name" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-file-signature text-danger"></i> Edit Site Name</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="update-name-query.php" method='post' enctype='multipart/form-data'>
                                            <div class="mb-3">
                                                <label class="form-label">Name </label>
                                                <input type="text" value='<?php echo $row['site_name']  ?>' class="form-control form-control-sm shadow-none border border-danger" name='site_name' required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Logo</label>
                                                <input type="file" class="form-control form-control-sm shadow-none border border-danger" name='new_site_img'>
                                                <input type="hidden" value='<?php echo $row['site_logo']  ?>' name='old_site_img'>
                                            </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name='edit-name' class="btn btn-danger btn-sm text-white">Save changes</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal-end -->


                    </div>
                </div><!-- card -->



                <div class="card">

                    <?php
                    // to get contact info from the database
                    $contact_select_qry = "SELECT * FROM `contact_info`";
                    $contact_select_qry_result = mysqli_query($cn, $contact_select_qry);
                    if (mysqli_num_rows($contact_select_qry_result) > 0) {

                        $row2 = mysqli_fetch_assoc($contact_select_qry_result);
                    }

                    ?>
                    <div class="row p-3">
                        <h5 class='mb-3 ms-1'><i class="fa-solid fa-address-card text-danger"></i> Contact Info </h5>

                        <div class="col-md-4 col-sm-6">
                            <h6> Mobile : <span class='text-danger'><?php echo $row2['contact_mobile']  ?></span> </h6>
                        </div>

                        <div class="col-md-4 col-sm-6 ">
                            <h6> Email : <span class='text-danger'><?php echo $row2['contact_email']  ?></span> </h6>
                        </div>

                        <div class="col-md-4 col-sm-6 ">
                            <h6> Address : <span class='text-danger'><?php echo $row2['contact_address']  ?></span> </h6>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <button type="button" class='btn btn-danger btn-sm shadow-none text-white' data-bs-toggle="modal" data-bs-target="#edit-contact"><i class="fa-solid fa-pen"></i> Edit Contact Info</button>
                        </div>

                        <!-- Modal to change contact info -->
                        <div class="modal fade" id="edit-contact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-file-signature text-danger"></i> Edit Name</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="update-contact-info-qry.php" method='post'>

                                            <div class="mb-3">
                                                <label class="form-label">Mobile </label>
                                                <input type="text" value='<?php echo $row2['contact_mobile']  ?>' class="form-control form-control-sm shadow-none border border-danger" name='contact_mobile' required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" value='<?php echo $row2['contact_email']  ?>' class="form-control form-control-sm shadow-none border border-danger" name='contact_email' required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <input type="text" value='<?php echo $row2['contact_address']  ?>' class="form-control form-control-sm shadow-none border border-danger" name='contact_address' required>
                                            </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name='edit-contact' class="btn btn-danger btn-sm text-white">Save changes</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal-end -->


                    </div>
                </div><!-- card -->

            </div><!-- p3 -->
        </div><!-- content -->
    </div><!-- main-container -->


</body>

</html>

<!-- Remove Notification after 5  sec -->
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#notification-status').fadeOut();
        }, 3000);

    });
</script>