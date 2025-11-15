<footer class="bg-white p-2 py-3 mt-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4    ">
                <a class="text-decoration-none" href="index.php">
                    <h3 class="mb-2 text-dark"><i class="fa-solid fa-blog text-danger"></i> Blog Site</span></h2>
                </a>
                <p align='justify'>Welcome to my blog! 🌸 This is a space where I share ideas, stories, and knowledge in a simple and creative way. Each post is written with passion and aims to inspire, inform, and connect with readers. Whether it’s everyday thoughts, useful tips, or creative content, my goal is to make this blog a place of learning and inspiration. 💡✨</p>
            </div>
            <div class="col-lg-4 ps-lg-5">
                <h4>Useful Links</h4>
                <ul>
                    <li> <a href="all-posts.php" class="text-decoration-none text-dark">All Posts</a></li>
                    <li> <a href="all-posts.php" class="text-decoration-none text-dark">Popular Posts</a></li>
                    <li> <a href="Admin/login.php" class="text-decoration-none text-dark">Admin_login</a></li>




                </ul>
            </div>
            <div class="col-lg-4">
                <h4>Contact Info</h4>
                <div>

                    <?php
                    // to get contact info from the database
                    require("./config.php");
                    $contact_select_qry = "SELECT * FROM `contact_info`";
                    $contact_select_qry_result = mysqli_query($cn, $contact_select_qry);
                    if (mysqli_num_rows($contact_select_qry_result) > 0) {

                        $row2 = mysqli_fetch_assoc($contact_select_qry_result);
                    }

                    ?>

                    <div class="my-2"><i class="fa-solid fa-phone "></i> <?php echo $row2['contact_mobile']  ?></div>
                    <div class="my-2"><i class="fa-solid fa-envelope "></i> <?php echo $row2['contact_email']  ?></div>
                    <div class="my-2"><i class="fa-solid fa-location-dot "></i> <?php echo $row2['contact_address']  ?></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="row m-0 bg-danger py-1">
    <p class="text-center fs-5 text-white">Copyright All Rights Reserved 2024</p>

</div>