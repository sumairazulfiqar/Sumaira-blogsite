<?php include("auth.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>View post</title>
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
                <nav class="bg-dark d-flex align-items-center justify-content-between px-3 py-2 mb-3">
                    <div>
                        <a href='add-post.php' class="text-decoration-none text-white me-3"><i class="bi bi-plus"></i> Add Post </a></li>
                        <a class="text-decoration-none text-danger"><i class="bi bi-eye-fill"></i> View Posts </a></li>
                    </div>
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

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">

                                <h5><i class="fa fa-eye"></i> View <span class="text-danger">post</span></h5>
                                <div class="w-100 my-3" style="height: 1px; background: lightgray"></div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr class="bg-danger text-white">
                                                <th scope="col">Title</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("config.php");

                                            $post_select_qry = "SELECT * FROM posts LEFT JOIN category ON posts.post_category = category.category_id LEFT JOIN admin ON posts.post_author = admin.admin_id";
                                            $post_select_res = mysqli_query($cn, $post_select_qry);

                                            if (mysqli_num_rows($post_select_res) > 0) {

                                                while ($row = mysqli_fetch_assoc($post_select_res)) {

                                            ?>

                                                    <tr>
                                                        <td><a href="post-details.php?id=<?php echo $row['post_id'] ?>" class='text-decoration-none text-dark'> <?php echo $row['post_title']  ?></a></td>
                                                        <td><?php echo $row['category_name']  ?></td>
                                                        <td><?php echo $row['post_date']  ?></td>
                                                        <td><?php echo $row['admin_name']  ?></td>
                                                        <td><?php if ($row['post_status'] == 1) {
                                                                echo "<span class='badge bg-secondary'>Normal</span>";
                                                            } else {
                                                                echo "<span class='badge bg-success'>Popular</span>";
                                                            }

                                                            ?></td>


                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-dark btn-sm dropdown-toggle shadow-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton1">
                                                                    <li><a class="dropdown-item" href="edit-post.php?id=<?php echo $row['post_id'] ?>"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                                                    <li><a class="dropdown-item" href="popular-post-query.php?id=<?php echo $row['post_id'] ?>"><i class="bi bi-fire"></i> Popular</a></li>
                                                                    <li><a class="dropdown-item" href="normal-post-query.php?id=<?php echo $row['post_id'] ?>"><i class="bi bi-signpost-fill"></i> Normal</a></li>
                                                                    <li><a class="dropdown-item" href="delete-post-query.php?id=<?php echo $row['post_id'] ?>"><i class="bi bi-trash"></i> Delete</a></li>
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

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#notification-status').fadeOut();
        }, 5000);

    });
</script>