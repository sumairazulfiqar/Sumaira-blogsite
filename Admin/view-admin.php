<?php  include("auth.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Admin</title>
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
                        <li class="me-3" aria-current="page"> <a href="add-admin.php" class="text-decoration-none text-white"><i class="bi bi-plus"></i> Add Admin </a></li>
                        <li aria-current="page"> <a class="text-decoration-none text-danger"><i class="bi bi-eye-fill"></i> View Admin </a></li>
                    </ol>
                </nav>


                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-body">

                            <div class="row">
                            <div class="col-lg-3">

                                <h5><i class="fa fa-eye"></i> View <span class="text-danger">Admin</span></h5>
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

                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr class="bg-danger text-white">
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Picture</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("config.php");

                                            $admin_select_qry = "SELECT * FROM `admin`";
                                            $admin_select_res = mysqli_query($cn, $admin_select_qry);

                                            if (mysqli_num_rows($admin_select_res) > 0) {

                                                while ($row = mysqli_fetch_assoc($admin_select_res)) {

                                            ?>

                                                    <tr>
                                                        <td><?php echo $row['admin_name']  ?></td>
                                                        <td><?php echo $row['admin_email']  ?></td>
                                                        <td><?php echo $row['admin_mobile']  ?></td>
                                                        <td><?php if ($row['admin_role'] == 0) {
                                                                echo "User";
                                                            } elseif ($row['admin_role'] == 1) {
                                                                echo "Admin";
                                                            } else {
                                                                echo "Super Admin";
                                                            }

                                                            ?></td>

                                                          <td><?php if ($row['admin_status'] == 0) {
                                                                echo "<span class='badge bg-secondary'>Inactive</span>";
                                                            } 
                                                            else {
                                                                echo "<span class='badge bg-success'>Active</span>";
                                                            }

                                                            ?></td>
                                                        <td><img src="<?php echo $row['admin_image']  ?>" height="50px" width="50px" class="img-thumbnail" alt=""></td>

                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-dark btn-sm dropdown-toggle shadow-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <ul class="dropdown-menu p-0">
                                                                    <li><a class="dropdown-item" href="edit-admin.php?id=<?php  echo $row['admin_id'] ?>"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                                                    <li><a class="dropdown-item" href="active-admin.php?id=<?php  echo $row['admin_id'] ?>"><i class="bi bi-check-circle-fill"></i> Active</a></li>
                                                                    <li><a class="dropdown-item" href="inactive-admin.php?id=<?php  echo $row['admin_id'] ?>"><i class="bi bi-x-circle-fill"></i> Inactive</a></li>
                                                                    <li><a class="dropdown-item" href="delete-admin.php?id=<?php  echo $row['admin_id'] ?>"><i class="bi bi-trash"></i> Delete</a></li>
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




            </div><!--content-->
        </div><!--main-container-->
</body>

</html>