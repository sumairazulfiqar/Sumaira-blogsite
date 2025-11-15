<!DOCTYPE html>
<html lang="en">

<head>
    <title>Categories </title>
    <!--Links--><?php include("./includes/links.php")  ?>

    <!-- Swiper JS links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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
            background: #ffc107;
            margin: 15px auto;
            margin-top: -15px;
        }

        .category {
            overflow: hidden;
            position: relative;

        }

        .category:hover .content {
            top: 0;
        }

        .content {
            color: white;
            position: absolute;
            top: -100%;
            width: 100%;
            left: 0;
            height: 100%;
            transform: translate();
            box-sizing: border-box;
            padding: 20px;
            transition: all 0.5s;
            background-color: rgba(0, 0, 0, 0.5)
        }


         
         body{

 background: #f9efefff ;

    }

   
    </style>

</head>

<body class="">
    <!-- Navbar--><?php include("./includes/navbar.php")  ?>

    <h3 class="text-center my-4 h5 fs-3 m-0">ALL <span class="text-danger">CATEGORIES</span></h3>
    <div class="h-line"></div>

    <div class="container">
        <div class="row">

            <?php
            include("config.php");

            $category_select_qry = "SELECT * FROM `category`";
            $category_select_res = mysqli_query($cn, $category_select_qry);

            if (mysqli_num_rows($category_select_res) > 0) {

                while ($row = mysqli_fetch_assoc($category_select_res)) {

            ?>
                    <div class="col-lg-3 mb-4 p-2">
                        <div class="card text-white move border-0 shadow mx-auto category">

                            <img src="Admin/<?php echo $row['category_img'] ?>" alt="Team Member" class="card-img-top img-fluid">


                            <a href="post-by-category.php?id=<?= $row['category_id'] ?>" class='text-decoration-none text-white'>
                                <div class="card-img-overlay content text-center">
                                    <h5 class="mt-4"><?php echo $row['category_name'] ?></h5>
                                    <a href="post-by-category.php?id=<?= $row['category_id'] ?>" class="btn btn-danger shadow-none"><i class="fa fa-eye"></i> View Posts</a>
                                </div>
                            </a>
                        </div>
                    </div><!--col-->

            <?php
                }
            } ?>



        </div><!--row-->
    </div><!--container-->




    <?php include("./includes/footer.php")  ?>

</body>

</html>