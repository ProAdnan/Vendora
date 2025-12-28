<?php
session_start();

require_once __DIR__ . './../classes/Database.php';
require_once __DIR__ . './../classes/Product.php';




if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Invalid product ID');
}


// if (!isset($_GET['cat']) || !is_numeric($_GET['cat'])) {
//     die('Invalid category ID');
// }


$id = (int) $_GET['id'];
$category = (int) $_GET['cat'];


$product = new Product();

$single_product = $product->readOne($id);

$products_same_category = $product->read_by_category($category);

$num_p = $products_same_category->rowCount();

if (!$single_product) {

    die('product not found');

}



if (!$products_same_category) {

    die('products by cat not found');


}

$cat_name = $product->get_single_categoty($single_product['category_id']);



$discount = $product->read_all_discounts();


$dis_nums = $discount->rowCount();




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike Air Red | Vendora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

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

    <?php

    if ($dis_nums > 0) {

        while ($dis_row = $discount->fetch()) {

            if ($dis_row['product_id'] == $single_product['product_id']) {

                echo <<<EOT

<div style="width: 100%;height: 2px; background-color: #dc3545;position: relative;margin: 20px 0;">


    <span style="position: absolute;top: -10px;left: 50%;transform: translateX(-50%);background: #fff;padding: 0 10px;font-size: 12px;color: #dc3545;font-weight: bold;">
        {$dis_row['discount']}% Discount on this product
    </span>


</div>




EOT;

            }

        }


    }



    ?>




    <div class="container py-5">
        <div class="row g-5">
            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="card card-custom border-0 p-3">

                    <img src="./../assets/img/<?= htmlspecialchars($single_product['image_path']) ?>"
                        class="img-fluid rounded" alt="Product Image">

                </div>
            </div>




            <!-- Product Info -->
            <div class="col-lg-6">
                <span class="badge bg-primary-custom bg-opacity-10 text-primary-custom px-3 py-2 rounded-pill mb-3">In
                    Stock</span>
                <h1 class="fw-bold mb-2"><?= $single_product['product_name'] ?></h1>
                <span class="badge bg-light text-dark border"><?= $cat_name['category_name'] ?></span>
                <div class="mb-3">
                    <span class="text-warning"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-half"></i></span>
                    <span class="text-muted ms-2">(124 reviews)</span>
                </div>
                <h2 class="fw-bold text-primary-custom mb-4"><?= $single_product['price'] ?>$</h2>

                <p class="text-muted mb-4 lead" style="font-size: 1rem;">
                    <?= $single_product['product_description'] ?>
                </p>

                <div class="d-flex gap-3 mb-4">
                    <input type="number" class="form-control w-25 text-center" value="1" min="1">
                    <button class="btn btn-primary-custom flex-grow-1"
                        onclick="window.location.href='./cart.php?id={$single_product['product_id']}'">Add
                        to
                        Cart</button>
                    <button class="btn btn-outline-danger"><i class="bi bi-heart"></i></button>
                </div>

                <hr class="my-4">



                <!-- Reviews -->
                <div>
                    <h5 class="fw-bold mb-3">Customer Reviews</h5>
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1">
                            <span class="fw-bold me-2">Jane Doe</span>
                            <span class="text-warning small"><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></span>
                        </div>
                        <p class="text-muted small">Absolutely love these shoes! Very comfortable and they look great.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="fw-bold mb-4">You might also like</h3>
            <div class="row g-4">

                <?php

                if ($num_p > 0) {


                    while ($product = $products_same_category->fetch()) {


                        if ($product['product_id'] == $single_product['product_id']) {

                            continue;

                        }


                        $image = $product['image_path'];

                        echo <<<EOT
                <div class="col-md-3">
                    <div class="card card-custom h-100">


                        <img src="./../assets/img/{$image}" 
                            class="card-img-top" style="height: 200px;" alt="Related">
                        <div class="card-body">
                            <h6 class="fw-bold">{$product['product_name']}</h6>
                            <span class="text-primary-custom fw-bold">{$product['price']}</span>
                        </div>

                        <a href="./product-details.php?id={$product['product_id']}&cat={$product['category_id']}" class="btn btn-sm btn-outline-custom">View</a>
                    </div>
                </div>

EOT;

                    }








                } else {

                    echo "<p>No Related Products Found</p>";
                }






                ?>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>