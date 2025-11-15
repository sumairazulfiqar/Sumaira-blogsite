<?php include("auth.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog Site - Dashboard</title>
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


            <?php
            include("config.php");

            $category_id = $_GET['id'];

            $category_select_qry = "SELECT * FROM `category` WHERE category_id = '$category_id'";
            $category_select_res = mysqli_query($cn, $category_select_qry);

            if (mysqli_num_rows($category_select_res) > 0) {

                $row = mysqli_fetch_assoc($category_select_res);
            }
            ?>

            <div class="p-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">

                                <h5><i class="bi bi-pencil-square"></i> Edit <span class="text-danger">Category</span></h5>
                            </div>
                            <div class="col-lg-9  text-end">
                            </div>

                        </div>
                        <div class="w-100 my-3" style="height: 1px; background: lightgray"></div>




                        <form action="update-category-query.php" method='post' enctype="multipart/form-data" class="row needs-validation" novalidate>

                            <input type="hidden" value='<?php echo $category_id; ?>' name='category_id'>

                            <div class="col-md-6 p-2 px-3">
                                <label for="cat-name" class="form-label">Category Name</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" onkeyup="this.value = this.value.toUpperCase();" value='<?php echo  $row['category_name'] ?>' placeholder="Enter here..." name='category_name' required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 p-2 px-3">
                                <label for="cat-img" class="form-label">Category Image</label>
                                <div class="input-group has-validation">
                                    <input type="hidden" name='old_category_img' class="form-control shadow-none border border-danger" value='<?php echo $row['category_img'] ?>' required>
                                    <input type="file" name="new_category_img" class="form-control shadow-none border border-danger">
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                    </div>

                    <div class="w-100 my-1" style="height: 1px; background: lightgray"></div>


                    <div class="row">
                        <div class="col-lg-6 py-2 px-4">
                            <img src="<?php echo  $row['category_img'] ?>" height='80px' alt="">
                        </div>

                        <div class="col-lg-6 py-2 px-4">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger text-white shadow-none" name="edit-category"><i class=""></i> Save & Submit</button>
                            </div>
                        </div>
                    </div>

                    </form>


                </div>
            </div>
            <!-- form-card -->

        </div>
    </div>
    </div>




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