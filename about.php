<!DOCTYPE html>
<html lang="en">

<head>
    <title>About</title>
    <!--Links--><?php include("./includes/links.php")  ?>

    <!-- Swiper JS links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
        .move:hover {
            transform: scale(1.1);
        }

        .h-line {
            max-width: 100px;
            height: 2px;
            background: #dc3545 ;
            margin: 15px auto;
            margin-top: -15px;
        }

        html,
        body {
            position: relative;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .swiper-slide img {
            display: block;
            width: 120px;
            height: 120px;
            margin: 5px auto;
            border-radius: 50%;
            object-fit: cover;
        }

        .move {
            transition: all 0.3s;
        }

        .move:hover {
            transform: scale(1.1);
        }


          
         body{

 background: #f9efefff ;

    }

    
    </style>

</head>

<body class="">
    <!-- Navbar--><?php include("./includes/navbar.php")  ?>

    <h3 class="text-center my-4 h5 fs-3 m-0">ABOUT <span class="text-danger">US</span></h3>
    <div class="h-line"></div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-6 p-3 order-1">
                <p align='justify'>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia eligendi fugit fuga eaque earum explicabo. Porro voluptatem eius repellendus, ipsum voluptatum sint labore quaerat fugit dolorum illum, a nisi necessitatibus architecto dolorem nobis sed ut! Enim nisi maxime laudantium ut quibusdam assumenda ratione sit dolore aperiam ipsa illo voluptatem non at, cum quia architecto doloremque atque dicta, dignissimos repellendus facere est voluptas quisquam. Animi non officiis laudantium sequi, adipisci optio cupiditate placeat exercitationem quibusdam earum?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa commodi quaerat rerum. Quidem dignissimos laboriosam vitae perferendis eligendi dicta quod quia itaque in and that is it.
                </p>
            </div>
            <div class="col-lg-6 p-3 order-md-1">
                <img src="./Assets/imgs/About.jpg" class="w-100" alt="about image">
            </div>

        </div>
    </div>


    <h3 class="text-center my-4 h5 fs-3 m-0">PROGRESS <span class="text-danger">COUNTER</span></h3>
    <div class="h-line"></div>

    <div class="container counter">
        <div class="row">
            <div class="col-lg-3 py-4 bg-dark border-end border-white mb-2">
                <div class="text-white text-center" style="font-size: 1.5rem;">
                    <i class="bi bi-signpost-2-fill text-danger" style="font-size: 3rem;"></i>
                    <h1 id="posts-counter" class="text-center m-0" style="font-size: 2rem;">0</h1>
                    <p class="text-center">Total <span class="text-danger">Posts</span></p>
                </div>
            </div>

            <div class="col-lg-3 py-4 bg-dark border-end border-white mb-2">
                <div class="text-white text-center" style="font-size: 1.5rem;">
                    <i class="bi bi-stack text-danger" style="font-size: 3rem;"></i>
                    <h1 id="categories-counter" class="text-center m-0" style="font-size: 2rem;">0</h1>
                    <p class="text-center">Different <span class="text-danger">Categories</span></p>
                </div>
            </div>

            <div class="col-lg-3 py-4 bg-dark border-end border-white mb-2">
                <div class="text-white text-center" style="font-size: 1.5rem;">
                    <i class="bi bi-stars text-danger" style="font-size: 3rem;"></i>
                    <h1 id="reviews-counter" class="text-center m-0" style="font-size: 2rem;">0</h1>
                    <p class="text-center">Posivtive <span class="text-danger">Reviews</span></p>
                </div>
            </div>

            <div class="col-lg-3 p-3 bg-dark border-end border-white mb-2">
                <div class="text-white text-center" style="font-size: 1.5rem;">
                    <i class="bi bi-people-fill text-danger" style="font-size: 3rem;"></i>
                    <h1 id="writers-counter" class="text-center m-0" style="font-size: 2rem;">0</h1>
                    <p class="text-center">Content <span class="text-danger">Writers</span></p>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-center my-4 fs-3 m-0">OUR <span class="text-danger">TEAM</span></h3>
    <div class="h-line"></div>
    <div class="container my-5">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <?php include("config.php");

                $get_admin = "SELECT * FROM admin";
                $get_admin_qry_run = mysqli_query($cn, $get_admin);
                while ($fetch_admin = mysqli_fetch_assoc($get_admin_qry_run)) {


                ?>

                    <div class="swiper-slide py-3">
                        <div class="card border-0 shadow mx-auto p-1">
                            <img src="./Admin/<?= $fetch_admin['admin_image'] ?>" alt="Team Member">
                            <div class="card-body p-3">

                                <h6 class="text-center"><?= $fetch_admin['admin_name'] ?></h6>

                                <p><?= $fetch_admin['admin_about'] ?></p>
                            </div>
                        </div>
                    </div>

                <?php   } ?>
            </div>

        </div>
    </div>


    <?php include("./includes/footer.php")  ?>

</body>

</html>
<?php

// for all posts
$post_count_query = "SELECT COUNT(*) AS post_count FROM posts";
$post_count_result = mysqli_query($cn, $post_count_query);
$post_count_row = mysqli_fetch_assoc($post_count_result);
$all_posts = $post_count_row['post_count'];

// for all categories
$category_count_query = "SELECT COUNT(*) AS category_count FROM category";
$category_count_result = mysqli_query($cn, $category_count_query);
$category_count_row = mysqli_fetch_assoc($category_count_result);
$all_categories = $category_count_row['category_count'];

// for all authors
$authors_count_query = "SELECT COUNT(*) AS authors_count FROM admin WHERE admin_role = 0 OR admin_role = 1";
$authors_count_result = mysqli_query($cn, $authors_count_query);
$authors_count_row = mysqli_fetch_assoc($authors_count_result);
$all_authors = $authors_count_row['authors_count'];

// for all messages
$msgs_count_query = "SELECT COUNT(*) AS msgs_count FROM users_messages";
$msgs_count_result = mysqli_query($cn, $msgs_count_query);
$msgs_count_row = mysqli_fetch_assoc($msgs_count_result);
$all_msgs = $msgs_count_row['msgs_count'];

?>
<script>
    // Counter Function
    function startCounter(elementId, targetValue) {
        let counter = 0;
        const increment = Math.ceil(targetValue / 50); // Adjust the increment based on the target value

        function updateCounter() {
            if (counter <= targetValue) {
                $('#' + elementId).text(counter);
                counter += increment;
                setTimeout(updateCounter, 50); // Adjust the timeout for the desired speed
            }
        }

        updateCounter();
    }

    $(document).ready(function() {
        startCounter('posts-counter', <?= $all_posts ?>);
        startCounter('categories-counter', <?= $all_categories ?>);
        startCounter('reviews-counter', <?= $all_msgs ?>);
        startCounter('writers-counter', <?= $all_authors ?>);
    });



    // Team slider funcion of swiper js

    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 50,
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true
        },
        breakpoints: {
            1080: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 2
            },
            640: {
                slidesPerView: 1
            },
            500: {
                slidesPerView: 1
            }
        }
    });
</script>