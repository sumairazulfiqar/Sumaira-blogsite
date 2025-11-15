<aside class="bg-danger" id="sidebar">
    <!-- dashbord title -->

    <?php
    include("config.php");

    $name_select_qry = "SELECT * FROM `site_name`";
    $name_select_qry_result = mysqli_query($cn, $name_select_qry);
    if (mysqli_num_rows($name_select_qry_result) > 0) {

        $row = mysqli_fetch_assoc($name_select_qry_result);
    }

    ?>
    <div class="text-center mb-3 bg-dark p-3 text-white">
        <h2 class="m-0 d-flex align-items-center justify-content-center"><img src="../Admin/<?php echo $row['site_logo']  ?>" class='me-1' height='40px' width='40px' alt="Site Logo"> <?php echo $row['site_name'] ?></h2>
    </div>

    <!-- admin details -->
    <div class="text-light m-0 row text-center text-lg-start mb-2">
        <div class="col-lg-4">
            <a href="profile.php" class="text-decoration-none text-white"> <img src="<?php echo $_SESSION['admin_image'] ?>" class="rounded-circle img-thumbnail" height="60px" width="60px" alt="admin-img" /> </a>
        </div>
        <div class="col-lg-8">

            <span>Welcome</span>
            <a href="profile.php" class="text-decoration-none text-white"> <span class="m-0 fw-bold" style='font-size:14px;'><?php echo $_SESSION['admin_name'] ?></span></a>
        </div>

    </div>

    <div class="w-100 mt-3" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>

    <!-- menu start -->
    <div>
        <ul class="nav flex-column">
            <li class="nav-item text-center text-md-start">
                <a class="nav-link text-white menu" aria-current="page" href="index.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <div class="w-100" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>

            </li>
            <li class="nav-item text-center text-md-start">
                <a class="nav-link text-white menu" aria-current="page" href="categories.php"><i class="bi bi-stack"></i>
                    Categories</a>
                <div class="w-100" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>

            </li>

            <li class="nav-item text-center text-md-start">

                <a class="nav-link text-white menu" data-bs-toggle="collapse" href="#post" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="bi bi-signpost-2-fill"></i> Posts
                </a>
                <div class="w-100" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>

            <li class="nav-item mb-1 text-center text-md-start collapse " id="post">
                <a class="nav-link text-dark bg-light menu" aria-current="page" href="add-post.php"><i class="bi bi-plus"></i>
                    Add Post</a>
                <div class="w-100" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>


                <a class="nav-link text-dark bg-light menu" aria-current="page" href="view-posts.php"><i class="bi bi-eye-fill"></i>
                    View Post</a>
                <div class="w-100" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>

            </li>
            </li>

            <li class="nav-item text-center text-md-start">
                <a class="nav-link text-white menu" aria-current="page" href="faq.php"><i class="fa-solid fa-circle-question me-1"></i></i>FAQ's</a>
                <div class="w-100" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>
            </li>

            <li class="nav-item text-center text-md-start">
                <a class="nav-link text-white menu" aria-current="page" href="user-messages.php"><i class="bi bi-wechat me-1"></i>User Messages</a>
                <div class="w-100" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>
            </li>

            <li class="nav-item text-center text-md-start">
                <a class="nav-link text-white menu" aria-current="page" href="setting.php"><i class="bi bi-gear-fill me-1"></i>Settings</a>
                <div class="w-100" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>
            </li>

            <li class="nav-item text-center m-0 text-md-start">
                <a class="nav-link text-white menu" aria-current="page" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                <div class="w-100" style="height: 1px; background:  rgba(255, 255, 255, 0.3);"></div>

            </li>
        </ul>
    </div>
</aside>