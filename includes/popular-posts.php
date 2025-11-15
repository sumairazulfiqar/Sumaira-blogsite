<h4 class="text-white p-2 bg-danger"><i class="fa-solid fa-fire-flame-curved"></i> Popular Posts</h4>

<?php
require_once("./config.php");
$get_posts = "SELECT * FROM posts WHERE post_status = 0 ORDER BY post_date DESC LIMIT 6";
$get_posts_qry_run = mysqli_query($cn, $get_posts);

while ($fetch_posts = mysqli_fetch_assoc($get_posts_qry_run)) {

?>

    <div class="d-flex bg-white p-1 mb-2">

        <div class="w-25 p-1">
            <a href="single-post.php?id=<?= $fetch_posts['post_id'] ?>"><img src="./Admin/<?php echo $fetch_posts['post_image'] ?>" alt="Post Image" class="img-fluid">
            </a>
        </div>

        <div class="w-75 p-1">
            <a href="single-post.php?id=<?= $fetch_posts['post_id'] ?>" class="text-decoration-none">
                <h6 class="text-danger"><?php echo $fetch_posts['post_title'] ?></h6>
                <div class="my-1 post-details text-end">
                    <span class="mx-2 text-dark" title="Date"><i class="bi bi-calendar3 text-danger"></i> <?php echo $fetch_posts['post_date'] ?></span>
                </div>
            </a>
        </div>
    </div>

<?php } ?>