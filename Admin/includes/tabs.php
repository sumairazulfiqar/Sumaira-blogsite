<style>
    .move {
        transition: all 0.3s;
    }

    .move:hover {
        transform: scale(1.1);
    }
</style>

<!-- all posts -->

<?php
include("config.php");

$post_count_query = "SELECT COUNT(*) AS post_count FROM posts";
$post_count_result = mysqli_query($cn, $post_count_query);
$post_count_row = mysqli_fetch_assoc($post_count_result);
$all_posts = $post_count_row['post_count'];

?>

<div class="row">
    <div class="col-lg-3 col-md-6 p-2">
        <div class="card bg-dark shadow mb-3 border-0 move  text-white">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h3><?php echo $all_posts ?> Posts</h3>
                <i class="bi bi-signpost-2-fill  fs-1"></i>
            </div>
        </div>
    </div>

    <!-- all categories -->
    <?php
    $category_count_query = "SELECT COUNT(*) AS category_count FROM category";
    $category_count_result = mysqli_query($cn, $category_count_query);
    $category_count_row = mysqli_fetch_assoc($category_count_result);
    $all_categories = $category_count_row['category_count'];

    ?>

    <div class="col-lg-3 col-md-6  p-2">
        <div class="card text-white shadow bg-danger mb-3 border-0 move">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h3><?php echo $all_categories ?> Categories</h3>
                <i class="bi bi-stack fs-1"></i>
            </div>
        </div>
    </div>



    <!-- all authors -->
    <?php
    $authors_count_query = "SELECT COUNT(*) AS authors_count FROM admin WHERE admin_role = 0 OR admin_role = 1";
    $authors_count_result = mysqli_query($cn, $authors_count_query);
    $authors_count_row = mysqli_fetch_assoc($authors_count_result);
    $all_authors = $authors_count_row['authors_count'];

    ?>

    <div class="col-lg-3 col-md-6 p-2">
        <div class="card text-white shadow bg-dark  mb-3 border-0 move">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h3><?php echo $all_authors ?> Authors</h3>
                <i class="bi bi-person-workspace  fs-1"></i>
            </div>
        </div>
    </div>

    <!-- all users -->
    <?php
    $users_count_query = "SELECT COUNT(*) AS users_count FROM users";
    $users_count_result = mysqli_query($cn, $users_count_query);
    $users_count_row = mysqli_fetch_assoc($users_count_result);
    $all_users = $users_count_row['users_count'];


    ?>

    <div class="col-lg-3 col-md-6 p-2">
        <div class="card text-white shadow bg-danger mb-3 border-0 move">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h3><?php echo $all_users ?> Users</h3>
                <i class="bi bi-people-fill fs-1"></i>
            </div>
        </div>
    </div>
</div>