<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <!--Links--><?php include("./includes/links.php")  ?>
    <style>
        .move {
            transition: all 0.3s;
        }

        .move:hover {
            transform: scale(1.1);
        }

        .h-line {
            max-width: 100px;
            height: 2px;
            background: #dc3545;
            margin: 15px 70px;
            margin-top: -43px;
        }

         body{

 background: #f9efefff ;

    }

    </style>

</head>

<body class="">
    <!-- Navbar--><?php include("./includes/navbar.php")  ?>

    <?php
    require("config.php");
    $get_id = $_GET['id'];
    $select_post = "SELECT * FROM posts LEFT JOIN category ON posts.post_category = category.category_id LEFT JOIN admin ON posts.post_author = admin.admin_id WHERE post_id = $get_id";
    $result = mysqli_query($cn, $select_post);
    $row = mysqli_fetch_assoc($result);
    ?>

    <!-- main conatiner start -->
    <div class="container">

        <div class="row">
            <div class="col-lg-8 p-3">


                <img src="./Admin/<?= $row['post_image'] ?>" alt="Post Image" class="img-fluid">
                <h4 class="my-3"><?= $row['post_title'] ?></h4>

                <div class="my-2 post-details text-end fs-5">
                    <span class="mx-2" title="Category"><i class="bi bi-tag text-danger"></i> <?= $row['category_name'] ?></span>
                    <span class="mx-2" title="Date"><i class="bi bi-calendar3 text-danger"></i> <?= $row['post_date'] ?></span>
                    <span class="mx-2" title="Author"><i class="bi bi-person-fill text-danger"></i> <?= $row['admin_name'] ?></span>
                </div>
                <p align='justify'>
                    <?= $row['post_description'] ?>
                </p>

            </div><!--col-8-->

            <div class="col-lg-4 p-3">

                <!-- Recent Posts --><?php include("./includes/popular-posts.php")  ?>
                <!-- Categories --><?php include("./includes/category.php")  ?>

            </div><!--col-4-->

        </div><!--row-->


        <h3 class="my-5 h5 fs-3 m-0">Recommended <span class="text-danger">Posts</span></h3>
        <div class="h-line"></div>

        <div class="row mb-2">

            <div class="col-lg-4 mb-3 p-3">
                <div class="card move shadow border-0" style="width: 18rem;">
                    <img src="./Assets/imgs/post-1.jpg" alt="Post Image" class="img-fluid card-img-top">

                    <div class="card-body">
                        <h5 class="card-title">Post title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-danger btn-sm">Read More...</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 mb-3 p-3">
                <div class="card move shadow border-0" style="width: 18rem;">
                    <img src="./Assets/imgs/post-2.jpg" alt="Post Image" class="img-fluid card-img-top">

                    <div class="card-body">
                        <h5 class="card-title">Post title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-danger btn-sm">Read More...</a>
                    </div>
                </div>
            </div>




            <div class="col-lg-4 mb-3 p-3">
                <div class="card move shadow border-0" style="width: 18rem;">
                    <img src="./Assets/imgs/post-3.jpg" alt="Post Image" class="img-fluid card-img-top">

                    <div class="card-body">
                        <h5 class="card-title">Post title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-danger btn-sm">Read More...</a>
                    </div>
                </div>
            </div>
        </div>




    </div><!--main conatiner-->

    <?php include("./includes/footer.php")  ?>

</body>

</html>