<?php include("auth.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>FAQ's</title>
    <!-- links --><?php include("./includes/links.php") ?>
       <style>
         body{

 background: #f9efefff ;

    }

    </style>
</head>

<body class="">

    <div class="main-container d-flex">

        <!-- sidebar -->
        <?php include("./includes/sidebar.php") ?>

        <div class="content" id="content">
            <!-- navbar -->
            <?php include("./includes/navbar.php") ?>

            <div class="p-3">

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3">

                                <h5><i class="fa fa-plus"></i> Add <span class="text-danger">Question</span></h5>
                            </div>

                            <!--empty col -->
                            <div class="col-lg-1"></div>

                            <div class="col-lg-8">
                                <?php
                                if (!empty($_SESSION['status'])) {
                                    $msg = $_SESSION['status'];
                                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert' id='notification-status'>
                                           <strong>Congratulations: </strong> $msg
								           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							             </div>";
                                }
                                unset($_SESSION['status']);

                                if (!empty($_SESSION['error'])) {
                                    $msg = $_SESSION['error'];
                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='notification-status'>
                                              <strong>danger: </strong> $msg
								              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							             </div>";
                                }
                                unset($_SESSION['error']);
                                ?>

                            </div>
                        </div>

                        <div class="w-100 my-3" style="height: 1px; background: lightgray"></div>

                        <form action="add-question-query.php" method="post" class="row needs-validation" novalidate>

                            <div class="col-m6-12 p-2 px-3">
                                <label for="question" class="form-label">Question</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" id="question" placeholder="Enter here..." name="question" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 p-2 px-3">
                                <label for="ans" class="form-label">Answer</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control shadow-none border border-danger" id="ans" placeholder="Enter here..." name="answer" required>
                                    <div class="invalid-feedback">
                                        All Fields are Required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label class="form-label"></label>
                                <div class="d-flex justify-content-end">

                                    <button type="reset" class="btn btn-danger text-white shadow-none me-3"><i class="bi bi-arrow-repeat"></i> Reset</button>
                                    <button type="submit" class="btn btn-danger text-white shadow-none" name="add-question"><i class="bi bi-plus"></i> Add Questioin</button>

                                </div>
                            </div>

                        </form>


                    </div>
                </div>
                <!-- form-card -->



                <div class="card mb-3">
                    <div class="card-body">
                        <h5><i class="fa fa-eye"></i> View <span class="text-danger">Questions</span></h5>
                        <div class="w-100 my-3" style="height: 1px; background: lightgray"></div>

                        <?php
                        include("config.php");
                        $get_questions = "SELECT * FROM `faq`";
                        $result = mysqli_query($cn, $get_questions);
                        $q = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {


                        ?>

                                <div class="row">
                                    <div class="col-md-12 p-2 px-3">
                                        <div class="d-flex justify-content-between">
                                            <h5><span class="text-white p-1 bg-danger me-2"> Q-No.<?= $q ?> </span> <?= $row['question'] ?></h5>
                                            <div>
                                                <a href="delete-question.php?id=<?= $row['id'] ?>"> <i class="fa fa-trash text-danger"></i></a>
                                            </div>
                                        </div>
                                        <p align='justify'><?= $row['answer'] ?></p>
                                    </div>

                                </div>

                        <?php $q++;
                            }
                        } ?>
                    </div>
                </div>

            </div><!--content-->
        </div><!--main-container-->
</body>

</html>

<!-- Input Masking -->
<script src="./Assets/masking/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();


    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>


<!-- Remove Notification after 5  sec -->
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#notification-status').fadeOut();
        }, 5000);

    });
</script>