<?php

session_start();



require_once __DIR__ . './../classes/Database.php';
require_once __DIR__ . './../classes/Product.php';





if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Invalid product ID');
}


if (!isset($_GET['cat']) || !is_numeric($_GET['cat'])) {
    die('Invalid category ID');
}


$id = (int) $_GET['id'];
$category = (int) $_GET['cat'];


$product = new Product();

$single_product = $product->readOne($id);





$all_categories = $product->read_all_category();

$number_of_categories = $all_categories->rowCount();





$single_category = $product->get_single_categoty($category);


$get_all_discounts = $product->read_all_discounts();

$discount_value = 0;
$start_date = null;
$end_date = null;

while ($discount = $get_all_discounts->fetch()) {
    if ($discount['product_id'] == $single_product['product_id']) {
        $discount_value = $discount['discount'];
        $start_date = $discount['start_date'];
        $end_date = $discount['end_date'];
        break; // found, no need to continue
    }
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product | Vendora Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="./../assets/css/style.css" rel="stylesheet">
    <style>
        .upload-box {
            border: 2px dashed #e0e0e0;
            border-radius: 12px;
            height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #8d99ae;
            background-color: #f8f9fa;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .upload-box:hover {
            border-color: var(--primary-color);
            background-color: #f0f4ff;
            color: var(--primary-color);
        }

        .upload-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0.6;
        }

        .upload-overlay {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Admin Context Navbar -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top border-bottom">
        <div class="container">
            <a class="navbar-brand" href="index.html">Vendora Admin</a>
            <div class="ms-auto">
                <a href="./admin_dashboard.php" class="btn btn-outline-secondary btn-sm">Cancel</a>
            </div>
        </div>
    </nav>





    <div class="container py-5">
        <form action="./update_process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?= $id ?>">
            <div class="row g-5">
                <!-- Image Upload Section -->
                <div class="col-lg-5">
                    <h5 class="fw-bold mb-3">Product Image</h5>

                    <!-- Simulated Upload Area with Existing Image -->
                    <div class="upload-box mb-3" onclick="document.getElementById('fileInput').click()">
                        <img src="./../assets/img/<?= $single_product['image_path'] ?>" alt="Product Image">
                        <div class="upload-overlay">
                            <i class="bi bi-cloud-arrow-up fs-1 mb-2"></i>
                            <p class="mb-0 fw-medium">Click to change image</p>
                            <small class="opacity-75">PNG, JPG up to 10MB</small>
                        </div>
                        <input type="file" id="fileInput" name="image" hidden>
                    </div>

                    <!-- Thumbnails Preview (Static) -->
                    <div class="d-flex gap-2">
                        <div class="ratio ratio-1x1 rounded border bg-white overflow-hidden" style="width: 80px;">
                            <img src="./../assets/img/<?= $single_product['image_path'] ?>"
                                class="w-100 h-100 object-fit-cover" alt="Thumbnail">
                        </div>
                        <div class="ratio ratio-1x1 rounded border bg-white" style="width: 80px;">
                            <div
                                class="d-flex align-items-center justify-content-center text-muted h-100 cursor-pointer">
                                <i class="bi bi-plus fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details Form -->
                <div class="col-lg-7">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold m-0">Edit Product</h2>

                        <input type="submit" name="submit" class="btn btn-primary-custom px-4" value="Update Product">
                    </div>

                    <div class="card card-custom p-4 border-0">
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Product Name</label>
                            <input type="text" class="form-control form-control-lg" name="name"
                                value="<?= $single_product['product_name'] ?>" placeholder="e.g. Nike Air Max" required>
                        </div>


                        <!--cat-->

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Category</label>
                                <select class="form-select" name="category_id">

                                    <?php
                                    if ($number_of_categories > 0) {

                                        while ($row = $all_categories->fetch()) {

                                            echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';

                                        }

                                    } else {

                                        echo '<option value="0">No Categories</option>';


                                    }




                                    ?>


                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Price ($)</label>
                                <input type="number" name="price" value="<?= $single_product['price'] ?>"
                                    class="form-control" placeholder="0.00" required>
                            </div>
                        </div>





                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Stock Quantity</label>
                                <input type="number" name="quantity" class="form-control"
                                    value="<?= $single_product['quantity'] ?>" placeholder="100">
                            </div>


                            <!--discount-->
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Discount (%)</label>
                                <input type="number" name="discount" value="<?= $discount_value ?>" id="discount"
                                    class="form-control" placeholder="0%" min="0" max="100">


                            </div>

                            <!-- Hidden date fields -->
                            <div class="col-md-6 mt-3 d-none" id="discountDates">
                                <label class="form-label fw-bold small text-muted">Discount Start Date</label>
                                <input type="date" name="discount_start" value="<?= $start_date ?>" id="discount_start"
                                    class="form-control">
                            </div>

                            <div class="col-md-6 mt-3 d-none" id="discountDates2">
                                <label class="form-label fw-bold small text-muted">Discount End Date</label>
                                <input type="date" name="discount_end" value="<?= $end_date ?>" id="discount_end"
                                    class="form-control">
                            </div>










                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Description</label>
                            <textarea class="form-control" rows="6" name="pro_desc"
                                placeholder="Describe the product features, specs, and benefits..."> <?php echo $single_product['product_description']; ?></textarea>
                        </div>

                        <div class="form-check text-muted small">
                            <input class="form-check-input" type="checkbox" id="feature" name="is_featured"
                                <?= ($single_product['is_featured'] == 1) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="feature">Make this product featured on homepage</label>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script>
        const discountInput = document.getElementById('discount');
        const startDate = document.getElementById('discountDates');
        const endDate = document.getElementById('discountDates2');
        const startInput = document.getElementById('discount_start');
        const endInput = document.getElementById('discount_end');

        discountInput.addEventListener('input', function () {
            if (this.value && this.value > 0) {
                // Show dates
                startDate.classList.remove('d-none');
                endDate.classList.remove('d-none');

                // Enable inputs
                startInput.disabled = false;
                endInput.disabled = false;
            } else {
                // Hide dates
                startDate.classList.add('d-none');
                endDate.classList.add('d-none');

                // Disable + clear inputs (important)
                startInput.value = '';
                endInput.value = '';
                startInput.disabled = true;
                endInput.disabled = true;
            }
        });

        // Disable dates by default (important for POST)
        startInput.disabled = true;
        endInput.disabled = true;
    </script>






    <script>
        // Simple script to show localized preview if user selects file
        const fileInput = document.getElementById('fileInput');
        const uploadBox = document.querySelector('.upload-box');

        fileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Replace the background image of the upload box for preview
                    const img = uploadBox.querySelector('img');
                    if (img) {
                        img.src = e.target.result;
                    } else {
                        // If no img tag exists (shouldn't happen in this template), create one
                        const newImg = document.createElement('img');
                        newImg.src = e.target.result;
                        uploadBox.insertBefore(newImg, uploadBox.firstChild);
                    }
                }
                reader.readAsDataURL(this.files[0]);

                const p = uploadBox.querySelector('.upload-overlay p');
                if (p) p.textContent = "Selected: " + this.files[0].name;
            }
        });
    </script>
</body>

</html>