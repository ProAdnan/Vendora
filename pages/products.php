<?php
session_start();

require_once __DIR__ . './../classes/Database.php';
require_once __DIR__ . './../classes/Product.php';



$product = new Product();


//$stmt = $product->readAll();
//$num = $stmt->rowCount();



$stmt2 = $product->read_all_category();
$nums_cat=$stmt2->rowCount();




$filters = [

    'category_id' => $_GET['category'] ?? null,
    'min_price' => $_GET['min_price'] ?? null,
    'max_price' => $_GET['max_price'] ?? null,
    'search' => $_GET['search'] ?? null

];


$stmt3 = $product->filterProducts($filters);

$num = $stmt3->rowCount();




?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Vendora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="./../assets/css/style.css" rel="stylesheet">
</head>

<body>

    <?php

    if (isset($_SESSION["user_type"])) {

        if ($_SESSION["user_type"] == "admin") {


            include './includes/admin_nav.php';


        } elseif ($_SESSION["user_type"] == "user") {


            include './includes/user_nav.php';


        } else {


            include './includes/guest_nav.php';


        }

    } else {

        include './../includes/guest_nav.php';

    }


    ?>


    <div class="container py-5">
        <div class="row">


            <!-- new side bar-->


            <div class="col-lg-3 mb-4">
                <form method="GET" class="filter-panel">

                    
                    <h5 class="fw-bold mb-3">Search</h5>
                    <div class="input-group mb-4">
                        <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                            class="form-control" placeholder="Search product...">
                        <!-- <button class="btn btn-primary-custom" type="submit">
                            <i class="bi bi-search"></i>
                        </button> -->
                    </div>
    
                  


                    <h5 class="fw-bold mb-3">Categories</h5>

                    <div class="form-check mb-2">

                        <input class="form-check-input" type="radio" name="category" value=""

                            <?= empty($_GET['category']) ? 'checked' : '' ?>  >


                        <label class="form-check-label fw-medium">All Products</label>

                    </div>


                    <?php if($nums_cat > 0) { ?>

                    <?php while ($row2 = $stmt2->fetch()): ?>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="category" value="<?= $row2['category_id'] ?>"

                                <?= (($_GET['category'] ?? '') == $row2['category_id']) ? 'checked' : '' ?>  >

                            <label class="form-check-label text-muted">
                                <?= htmlspecialchars($row2['category_name']) ?>
                            </label>
                        </div>


                    <?php endwhile; ?>

                        <?php 
                    } else {

                            echo '<li class="mb-2"><a href="#" class="text-decoration-none text-muted">No Categories yet</a></li>';


                    }


                        ?>

                    <!-- Price Range -->
                    <h5 class="fw-bold mt-4 mb-3">Price Range</h5>

                    <input type="number" name="min_price" class="form-control mb-2" placeholder="Min price"
                        value="<?= htmlspecialchars($_GET['min_price'] ?? '') ?>" >

                    <input type="number" name="max_price" class="form-control mb-3" placeholder="Max price"
                        value="<?= htmlspecialchars($_GET['max_price'] ?? '') ?>">

                   
                    <input type="submit" class="btn btn-primary-custom w-100" value="Apply Filters">

                    <!-- Reset -->
                    <a href="products.php" class="btn btn-outline-secondary w-100 mt-2" >
                        Reset
                    </a>

                </form>
            </div>


            <!--end new sidebar -->






            <!-- old Sidebar Filters -->
            <!-- <div class="col-lg-3 mb-4">
                <div class="filter-panel">
                    <h5 class="fw-bold mb-3">Search</h5>
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Search product...">
                        <button class="btn btn-primary-custom"><i class="bi bi-search"></i></button>
                    </div>

                    <h5 class="fw-bold mb-3">Categories</h5>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark fw-medium">All Products</a>
                        </li>

                        <?php
    /*
                        if ($num2 > 0) {
                            while ($row2 = $stmt2->fetch()) {

                                echo '<li class="mb-2"><a href="#" class="text-decoration-none text-muted"> ' . $row2['category_name'] . '</a></li>';
                            }

                        } else {
                            echo '<li class="mb-2"><a href="#" class="text-decoration-none text-muted">No Categories yet</a></li>';


                        }


*/

                        ?>


                    </ul>

                    <h5 class="fw-bold mb-3">Price Range</h5>
                    <input type="range" class="form-range" id="priceRange" min="0" max="1000">
                    <div class="d-flex justify-content-between small text-muted">
                        <span>$0</span>
                        <span>$1000+</span>
                    </div>

                    <h5 class="fw-bold my-3">Rating</h5>
                    <div class="d-flex flex-column gap-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="r5">
                            <label class="form-check-label text-warning" for="r5"><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="r4">
                            <label class="form-check-label text-warning" for="r4"><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i></label>
                        </div>
                    </div>
                </div>
            </div> -->


            <!-- end old sidebar  -->




            <!-- Product Grid -->
            <div class="col-lg-9">
                <div class="row g-4">

                    <?php

                    if ($num > 0) {


                        while ($row = $stmt3->fetch()) {

                            echo <<<EOT

                            <!-- Items -->
                    <div class="col-md-4">
                        <div class="card card-custom h-100">
                            <img src="./../assets/img/{$row['image_path']}"
                                class="card-img-top" alt="Product">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">{$row['product_name']}</h5>
                                <div class="mb-2 text-warning small">
                                    <i class="bi bi-star-fill"></i> 4.5
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <span class="price-text">{$row['price']} $</span>
                                    <a href="./product-details.php?id={$row['product_id']}&cat={$row['category_id']}" class="btn btn-sm btn-outline-custom">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
EOT;



                        }


                    } else {


                        echo '<p>No Products Yet';

                    }

                    ?>




                </div>


                <!-- Pagination
                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link bg-primary-custom border-primary-custom"
                                href="#">1</a></li>
                        <li class="page-item"><a class="page-link text-primary-custom" href="#">2</a></li>
                        <li class="page-item"><a class="page-link text-primary-custom" href="#">3</a></li>
                        <li class="page-item"><a class="page-link text-primary-custom" href="#">Next</a></li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>