<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search</title>
    <!--Links--><?php include("./includes/links.php")  ?>
      <style>
         body{

 background: #f9efefff ;

    }

    </style>

</head>

<body class="">
    <!-- Navbar--><?php include("./includes/navbar.php")  ?>


    <!-- main conatiner start -->
    <div class="container">

        <div class="row">
            <div class="col-lg-8 p-3">
                <h3 class="mb-4">Here is the result of your search word <span class="text-danger"> <?php echo mysqli_real_escape_string($cn, $_POST['search']); ?></span></h3>


                <?php
                require_once("./config.php");
                if (isset($_POST['search_btn'])) {



                    $search_term = mysqli_real_escape_string($cn, $_POST['search']);

                    $get_posts = "SELECT posts.post_id, posts.post_title, category.category_name, posts.post_image, posts.post_date, admin.admin_name, LEFT(posts.post_description, 150) AS preview  
                FROM posts 
                LEFT JOIN category ON posts.post_category = category.category_id 
                LEFT JOIN admin ON posts.post_author = admin.admin_id 
                WHERE posts.post_title LIKE '%$search_term%' OR category.category_name LIKE '%$search_term%'";

                    $get_posts_qry_run = mysqli_query($cn, $get_posts);

                    if (mysqli_num_rows($get_posts_qry_run) > 0) {
                        while ($fetch_posts = mysqli_fetch_assoc($get_posts_qry_run)) {

                ?>


                            <div class="row post-container p-2 mt-4 bg-white shadow mb-4 border-top border-2 border-danger">
                                <div class="col-lg-4 post-img  p-1">
                                    <img src="./Admin/<?php echo $fetch_posts['post_image']  ?>" alt="Post Image" class="img-fluid">
                                </div>
                                <div class="col-lg-8 post-content p-1">
                                    <a href="single-post.php?id=<?= $fetch_posts['post_id'] ?>" class="text-dark text-decoration-none">

                                        <h5><?php echo $fetch_posts['post_title']  ?></h5>
                                        <div class="my-1 post-details">
                                            <span class="mx-2" title="Category"><i class="bi bi-tag text-danger"></i> History</span>
                                            <span class="mx-2" title="Date"><i class="bi bi-calendar3 text-danger"></i> <?php echo $fetch_posts['post_date']  ?></span>
                                            <span class="mx-2" title="Author"><i class="bi bi-person-fill text-danger"></i> Muhammad Sultan</span>
                                        </div>
                                        <p align='justify' class="d-inline"><?php echo $fetch_posts['preview']  ?></p>
                                        <a href="#" class="text-decoration-none"> <span class="badge bg-danger m-1">Read More </span></a>
                                    </a>
                                </div>
                            </div>


                <?php  }
                    } else {
                        echo "Sorry the result <b>{$search_term}</b> is not found";
                    }
                } ?>

            </div><!--col-->

            <div class="col-lg-4 p-3">

                <!-- Recent Posts --><?php include("./includes/popular-posts.php")  ?>
                <!-- Categories --><?php include("./includes/category.php")  ?>

            </div>

        </div>
    </div>

    </div><!--row-->

    </div><!--main conatiner-->

    <?php include("./includes/footer.php")  ?>

</body>

</html>