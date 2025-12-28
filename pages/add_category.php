<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category | Vendora Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="" rel="stylesheet">
</head>

<body class="bg-light">

    <?php

    if (isset($_SESSION["user_type"])) {

        if ($_SESSION["user_type"] == "admin") {


            include './../includes/admin_nav.php';


        } elseif ($_SESSION["user_type"] == "user") {


            include './../includes/user_nav.php';


        } else {


            include './../includes/guest_nav.php';


        }

    } else {

        include './../includes/guest_nav.php';

    }







    ?>



    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h2 class="fw-bold mb-4 text-center">Add New Category</h2>

                <div class="card card-custom p-4 border-0">

                    <form action="category_process.php" method="post">

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">Category Name</label>
                            <input type="text" name="category" class="form-control form-control-lg"
                                placeholder="e.g. Electronics" required>
                        </div>

                        <div class="d-grid">
                             <input type="submit" name="submit" class="btn btn-primary-custom btn-lg" value="Add Category"><br>
                             <a href="./admin_dashboard.php" class="btn btn-primary-custom btn-lg">Cancel
                            </a>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>