<?php
require_once("./config.php");

// Assuming you get the current page number from the URL parameter 'page'
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set the number of posts per page
$posts_per_page = 4;

// Calculate the offset for pagination
$offset = ($current_page - 1) * $posts_per_page;

// Fetch total number of posts
$count_query = "SELECT COUNT(*) AS total_posts FROM posts";
$count_result = mysqli_query($cn, $count_query);
$total_posts = mysqli_fetch_assoc($count_result)['total_posts'];

// Calculate total pages
$total_pages = ceil($total_posts / $posts_per_page);

// Fetch posts for the current page
$get_posts = "SELECT posts.post_id, posts.post_title, category.category_name, posts.post_image, posts.post_date, admin.admin_name, LEFT(posts.post_description, 150) AS preview  
                FROM posts 
                LEFT JOIN category ON posts.post_category = category.category_id 
                LEFT JOIN admin ON posts.post_author = admin.admin_id 
                ORDER BY posts.post_date DESC 
                LIMIT $posts_per_page OFFSET $offset";

$get_posts_qry_run = mysqli_query($cn, $get_posts);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <!--Links-->
    <?php include("./includes/links.php") ?>


    <style>


body{

 background: #f9efefff ;

    }
        </style>

</head>

<body class="">
    <!-- Navbar-->
    <?php include("./includes/navbar.php") ?>

    <!-- main container start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 p-3">
                <h3 class="mb-4">All <span class="text-danger"> Posts</span></h3>

                <?php
                while ($fetch_posts = mysqli_fetch_assoc($get_posts_qry_run)) {
                ?>
                    <div class="row post-container p-2 mt-4 bg-white shadow mb-4 border-top border-2 border-danger">
                        <div class="col-lg-4 post-img p-1">
                            <img src="./Admin/<?php echo $fetch_posts['post_image'] ?>" alt="Post Image" class="img-fluid">
                        </div>
                        <div class="col-lg-8 post-content p-1">
                            <a href="single-post.php?id=<?= $fetch_posts['post_id'] ?>" class="text-dark text-decoration-none">
                                <h5><?php echo $fetch_posts['post_title'] ?></h5>
                                <div class="my-1 post-details">
                                    <span class="mx-2" title="Category"><i class="bi bi-tag text-danger"></i> <?php echo $fetch_posts['category_name'] ?></span>
                                    <span class="mx-2" title="Date"><i class="bi bi-calendar3 text-danger"></i> <?php echo $fetch_posts['post_date'] ?></span>
                                    <span class="mx-2" title="Author"><i class="bi bi-person-fill text-danger"></i> <?php echo $fetch_posts['admin_name'] ?></span>
                                </div>
                                <p align='justify' class="d-inline"><?php echo $fetch_posts['preview'] ?></p>
                                <a href="#" class="text-decoration-none"> <span class="badge bg-danger m-1">Read More </span></a>
                            </a>
                        </div>
                    </div>
                <?php } ?>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo '<li class="page-item ' . ($i == $current_page ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div><!-- col -->

            <div class="col-lg-4 p-3">
                <!-- Recent Posts -->
                <?php include("./includes/popular-posts.php") ?>
                <!-- Categories -->
                <?php include("./includes/category.php") ?>
            </div>
        </div><!-- row -->
    </div><!-- main container -->

    <?php include("./includes/footer.php") ?>
</body>

</html>