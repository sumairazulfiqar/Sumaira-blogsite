<!DOCTYPE html>
<html lang="en">

<head>
    <title>FAQ's</title>
    <!--Links--><?php include("./includes/links.php")  ?>
    <style>
        .h-line {
            max-width: 200px;
            height: 2px;
            background: #dc3545;
            margin: 15px 60px;
            margin-top: -15px;
        }

         
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
                <h4 class="my-4 fs-3">FREQUANTLY ASK <span class="text-danger">QUESTIONS</span></h4>
                <div class="h-line"></div>

                <?php
                include("config.php");
                $get_questions = "SELECT * FROM `faq`";
                $result = mysqli_query($cn, $get_questions);
                $q = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                        <div class="mt-5">
                            <h5 class="text-white p-1 d-inline mt-4 bg-danger">Q-No.<?= $q ?> </h5>
                            <h4 class="p-2 d-inline"><?= $row['question'] ?></h4>

                            <div class="m-2">
                                <p><?= $row['answer'] ?></p>
                            </div>
                        </div>
                <?php $q++;
                    }
                } ?>

            </div>


            <div class="col-lg-4 p-3">
                <!-- Recent Posts --><?php include("./includes/popular-posts.php")  ?>
                <!-- Categories --><?php include("./includes/category.php")  ?>
            </div>

        </div><!--row-->

    </div><!--main conatiner-->

    <?php include("./includes/footer.php")  ?>

</body>

</html>