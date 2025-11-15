<?php include("auth.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Messages</title>
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

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">

                                        <h5><i class="fa-solid fa-envelope"></i> View <span class="text-danger">Messages</span></h5>
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

                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr class="bg-danger text-white">
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("config.php");

                                            $message_select_qry = "SELECT * FROM `users_messages`";
                                            $message_select_res = mysqli_query($cn, $message_select_qry);

                                            if (mysqli_num_rows($message_select_res) > 0) {

                                                while ($row = mysqli_fetch_assoc($message_select_res)) {

                                            ?>

                                                    <tr>
                                                        <td><?php echo $row['user_name']  ?></td>
                                                        <td><?php echo $row['user_email']  ?></td>
                                                        <td><?php echo $row['message_subject']  ?></td>
                                                        <td> <button type="button" class="btn btn-danger btn-sm text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#description"><i class='fa fa-eye'></i> Message</button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="description" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php echo $row['message']; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger btn-sm shadow-none" data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><?php if ($row['user_status'] == 2) {
                                                                echo "<span class='badge bg-success'>Posivtive</span>";
                                                            } else {
                                                                echo "<span class='badge bg-secondary'>Normal</span>";
                                                            } ?></td>

                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-dark btn-sm dropdown-toggle shadow-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton1">
                                                                    <li><a class="dropdown-item" href="positive-message-query.php?id=<?php echo $row['user_id']; ?>"><i class="bi bi-plus"></i> Positive</a></li>
                                                                    <li><a class="dropdown-item" href="normal-msg.php?id=<?php echo $row['user_id']; ?>"><i class="bi bi-pen"></i> Normal</a></li>
                                                                    <li><a class="dropdown-item" href="delete-message-query.php?id=<?php echo $row['user_id']; ?>"><i class="bi bi-trash"></i> Delete</a></li>

                                                                </ul>


                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>




            </div><!--content-->
        </div><!--main-container-->
</body>

</html>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#notification-status').fadeOut();
        }, 5000);

    });
</script>