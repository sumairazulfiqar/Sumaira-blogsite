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

            <div class="p-3">


                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <h5><i class="fa fa-plus"></i> Add <span class="text-danger">Category</span></h5>
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



                        <form action="add-category-query.php" method='post' enctype="multipart/form-data" class="row needs-validation" novalidate>

                            <div class="col-md-6 p-2 px-3">
                                <label for="cat-name" class="form-label">Category Name</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" onkeyup="this.value = this.value.toUpperCase();" id="cat-name" placeholder="Enter here..." name='category_name' required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 p-2 px-3">
                                <label for="cat-img" class="form-label">Category Image</label>
                                <div class="input-group has-validation">
                                    <input type="file" class="form-control shadow-none border border-danger" id="cat-img" placeholder="Enter here..." name='category_img' required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>

                    </div>

                    <div class="w-100 my-1" style="height: 1px; background: lightgray"></div>

                    <div class="col-lg-12 p-3">
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-danger text-white shadow-none me-3"><i class="bi bi-arrow-repeat"></i> Reset</button>
                            <button type="submit" class="btn btn-danger text-white shadow-none" name="add-category"><i class="bi bi-plus"></i> Add Category</button>

                        </div>
                    </div>

                    </form>


                </div>
            </div>
            <!-- form-card -->

            <div class='p-3'>
                <div class="card mb-3">
                    <div class="card-body">

                        <h5><i class="fa fa-eye"></i> View <span class="text-danger">Category</span></h5>
                        <div class="w-100 my-3" style="height: 1px; background: lightgray"></div>

                        <table class="table table-hover table-striped">
                            <thead>
                                <tr class="bg-danger text-white">
                                    <th scope="col">Category</th>
                                    <th scope="col">Posts</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include("config.php");

                                $category_select_qry = "SELECT * FROM `category`";
                                $category_select_res = mysqli_query($cn, $category_select_qry);

                                if (mysqli_num_rows($category_select_res) > 0) {

                                    while ($row = mysqli_fetch_assoc($category_select_res)) {

                                ?>

                                        <tr>
                                            <td><?php echo $row['category_name']  ?></td>
                                            <td> <span class="badge bg-danger rounded-pill">2</span></td>

                                            <td><img src="<?php echo $row['category_img']  ?>" height="50px" width="50px" class="img-thumbnail" alt=""></td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-dark btn-sm dropdown-toggle shadow-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="edit-category.php?id=<?php echo $row['category_id']; ?>"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="delete-category-query.php?id=<?php echo $row['category_id']; ?>"><i class="bi bi-trash"></i> Delete</a></li>

                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>

                                <?php
                                    }
                                } ?>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

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

<!-- Remove Notification after 5  sec -->
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#notification-status').fadeOut();
        }, 3000);

    });
</script>