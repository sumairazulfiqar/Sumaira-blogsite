<?php  include("auth.php") ?>

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
            <div class="container">

            <?php

            include("config.php");

            $get_post_id = $_GET['id'];

            $post_select_qry = "SELECT * FROM posts LEFT JOIN category ON posts.post_category = category.category_id LEFT JOIN admin ON posts.post_author = admin.admin_id WHERE post_id = '$get_post_id'";
            $post_select_res = mysqli_query($cn, $post_select_qry);

            if (mysqli_num_rows($post_select_res) > 0) {
                $row = mysqli_fetch_assoc($post_select_res);

             }

            ?>

            <div class="row">
                <div class="col-lg-6 p-2">
                    <div class="post-container">
                        <h2><?php echo $row['post_title'] ?></h2>
                           <p align='justify'>
                           <?php echo $row['post_description'] ?>
                           </p>
                    </div>
                </div>

            <div class="col-lg-6 p-2">
                <img src="<?php echo $row['post_image'] ?>" class='img-fluid img-thumbnail mb-3' alt="Post Image">
                <div class="text-muted d-flex justify-content-between shadow-sm border p-2" style='font-size:1.1rem'>
                    <span><i class="bi bi-calendar3 text-danger"> </i> <?php echo $row['post_date'] ?></span>
                    <span><i class="bi bi-person-fill text-danger"></i> <?php echo $row['admin_name'] ?> </span>
                    <span> <i class="bi bi-tag text-danger"></i> <?php echo $row['category_name'] ?> </span></div>
                </div>
            </div>
      
        </div>
            </div>

        </div>
    </div>


</body>

</html>