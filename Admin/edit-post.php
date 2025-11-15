<?php include("auth.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Post</title>
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

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3">

                                <h5><i class="fa fa-plus"></i> Add New<span class="text-danger"> Post</span></h5>
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

                        <?php
                        include("config.php");
                        $get_post_id = $_GET['id'];

                        $post_select_qry = "SELECT * FROM posts LEFT JOIN category ON posts.post_category = category.category_id LEFT JOIN admin ON posts.post_author = admin.admin_id WHERE post_id = '$get_post_id'";
                        $post_select_res = mysqli_query($cn, $post_select_qry);

                        if (mysqli_num_rows($post_select_res) > 0) {
                            $row = mysqli_fetch_assoc($post_select_res);
                        }
                        ?>


                        <form action="update-post-query.php" method="post" enctype="multipart/form-data" class="row needs-validation" novalidate>

                            <input type="hidden" value="<?php echo $row['post_id']  ?>" name="post_id" required>

                            <div class="col-md-4 p-2 px-3">
                                <label for="title" class="form-label">Post Title</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" value="<?php echo $row['post_title']  ?>" placeholder="Enter here..." name="post_title" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 p-2 px-3">
                                <label for="category" class="form-label">Post Category</label>
                                <select class="form-control border border-danger shadow-none" name="post_category">
                                    <option disabled selected> Choose here </option>
                                    <!-- Fetch category Dynamically from category Table -->
                                    <?php
                                    include("config.php");

                                    $sql = "SELECT * FROM category";
                                    $result = mysqli_query($cn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($categoryRow = mysqli_fetch_assoc($result)) {
                                            $categoryId = $categoryRow['category_id'];
                                            $categoryName = $categoryRow['category_name'];

                                            // Check if the current category matches the post's category
                                            $selected = ($row['post_category'] == $categoryId) ? 'selected' : '';

                                            echo "<option value='$categoryId' $selected>$categoryName</option>";
                                        }
                                    }

                                    ?>

                                </select>
                            </div>


                            <div class="col-md-4 p-2 px-3">
                                <label for="image" class="form-label">Post Image</label>
                                <div class="input-group has-validation">
                                    <input type="file" class="form-control shadow-none border border-danger" name="new_post_img">
                                    <input type="hidden" value='<?php echo $row['post_image'] ?>' name="old_post_img" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>




                            <div class="col-lg-12 p-2 px-3">
                                <label for="about" class="form-label">Post Description</label>
                                <textarea class="form-control shadow-none border border-danger py-1" rows='4' placeholder="Write here..." name="post_description" required><?php echo $row['post_description']  ?></textarea>
                                <div class="invalid-feedback">
                                    All Fields are Required.
                                </div>
                            </div>


                            <div class="w-100 my-3" style="height: 1px; background: lightgray"></div>

                            <div class="row">
                                <div class="col-lg-6 py-2 px-4">
                                    <img src="<?php echo  $row['post_image'] ?>" height='80px' alt="">
                                </div>

                                <div class="col-lg-6 py-2 px-4">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger text-white shadow-none" name="edit-post"><i class=""></i> Save & Submit</button>
                                    </div>
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