<div class="mt-2">
    <h4 class="text-white p-2 bg-danger"><i class="bi bi-stack"></i> Categories</h4>
    <ul class="list-group">


        <?php
        include("config.php");

        $category_select_qry = "SELECT * FROM `category`";
        $category_select_res = mysqli_query($cn, $category_select_qry);

        if (mysqli_num_rows($category_select_res) > 0) {

            while ($row = mysqli_fetch_assoc($category_select_res)) {

        ?>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="post-by-category.php?id=<?= $row['category_id'] ?>" class="text-decoration-none text-dark fw-bold"> <?php echo $row['category_name']  ?></a>
                </li>
        <?php
            }
        }
        ?>

    </ul>
</div>