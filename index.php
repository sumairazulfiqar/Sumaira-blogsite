<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <!--Links--><?php include("./includes/links.php");  ?>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .h-line {
            max-width: 100px;
            height: 2px;
            background: #dc3545 !important  ;
            margin: 15px 0;
            margin-top: -15px;

        }

         body{

 background: #f9efefff ;

    }


    </style>

</head>

<body class="">
    <!-- Navbar--><?php include("./includes/navbar.php");  ?>

    <!-- slider --><?php include("./includes/slider.php"); ?>

    <!-- main conatiner start -->
    <div class="container">

        <div class="row">
            <div class="col-lg-8">

                <h3 class=" my-4 fs-3 m-0">LATEST <span class="text-danger">POSTS</span></h3>
                <div class="h-line"></div>

                <?php
                require_once("./config.php");
                $get_posts = "SELECT posts.post_id, posts.post_title, category.category_name, posts.post_image, posts.post_date, admin.admin_name, LEFT(posts.post_description, 150) AS preview  
                FROM posts 
                LEFT JOIN category ON posts.post_category = category.category_id 
                LEFT JOIN admin ON posts.post_author = admin.admin_id 
                ORDER BY posts.post_date DESC 
                LIMIT 4";

                $get_posts_qry_run = mysqli_query($cn, $get_posts);

                while ($fetch_posts = mysqli_fetch_assoc($get_posts_qry_run)) {

                ?>


                    <div class="row post-container p-2 mt-4 bg-white shadow mb-4 border-top border-2 border-danger">

                        <div class="col-lg-4 post-img  p-1">
                            <a href="single-post.php?id=<?= $fetch_posts['post_id'] ?>"> <img src="./Admin/<?php echo $fetch_posts['post_image']  ?>" alt="Post Image" class="img-fluid"></a>
                        </div>
                        <div class="col-lg-8 post-content p-1">
                            <a href="single-post.php?id=<?= $fetch_posts['post_id'] ?>" class="text-dark text-decoration-none">
                                <h5><?php echo $fetch_posts['post_title']  ?></h5>
                                <div class="my-1 post-details">
                                    <span class="mx-2" title="Category"><i class="bi bi-tag text-danger"></i> <?php echo $fetch_posts['category_name']  ?></span>
                                    <span class="mx-2" title="Date"><i class="bi bi-calendar3 text-danger"></i> <?php echo $fetch_posts['post_date']  ?></span>
                                    <span class="mx-2" title="Author"><i class="bi bi-person-fill text-danger"></i> <?php echo $fetch_posts['admin_name']  ?></span>
                                </div>
                                <p align='justify' class="d-inline"><?php echo $fetch_posts['preview']  ?></p>
                                <span class="badge bg-danger m-1">Read More </span>
                            </a>
                        </div>
                    </div>

                <?php  } ?>


                <div class="text-center my-5">
                    <a href="all-posts.php" class="bg-danger px-3 py-2 border-0 text-white text-decoration-none" style="border-radius: 25px; ">View All Posts <i class="fa-solid fa-arrow-right"></i></a>
                </div>

            </div><!--col-->


            <div class="col-lg-4 p-3">
                <!-- Recent Posts --><?php include("./includes/popular-posts.php")  ?>
                <!-- Categories --><?php include("./includes/category.php")  ?>
            </div><!--col-->

        </div><!--row-->



        <h3 class="text-center my-2 fs-3 m-0">TESTI<span class="text-danger">MONIALS</span></h3>

        <!-- Swiper -->
        <div class="swiper mySwiper mb-3 p-3">
            <div class="swiper-wrapper p-2 mb-4">

                <?php
                $get_reviews_qry = "SELECT * FROM users_messages WHERE user_status =2";
                $get_reviews_qry_run = mysqli_query($cn, $get_reviews_qry);

                while ($fetch_reviews = mysqli_fetch_assoc($get_reviews_qry_run)) {


                ?>
                    <!-- slide-1 -->
                    <div class="swiper-slide p-2 shadow bg-white">
                        <p class="p-2"><i class="fa-solid fa-quote-left text-danger fs-3"></i> <?= $fetch_reviews['message'] ?> <i class="fa-solid fa-quote-right text-danger fs-3"></i></p>
                        <div class="text-center border border-danger rounded-pill p-1 w-75 mx-auto my-1">
                            <h5><?= $fetch_reviews['user_name'] ?></h5>
                        </div>

                    </div>

                <?php   } ?>
            </div>

            <div class="swiper-pagination"></div>

        </div>



    </div><!--main conatiner-->

    <?php include("./includes/footer.php")  ?>

</body>

</html>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        slidesPerView: "3",
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        }

    });
</script>