<?php


session_start();

require_once __DIR__ . './../classes/Database.php';
require_once __DIR__ . './../classes/Product.php';



$product = new Product();


$stmt = $product->read_all_category();


$num = $stmt->rowCount();



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Vendora Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
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
        }

        .upload-box:hover {
            border-color: var(--primary-color);
            background-color: #f0f4ff;
            color: var(--primary-color);
        }
    </style>
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
        <form action="./create_process.php" method="post" enctype="multipart/form-data" >
            <div class="row g-5">
                <!-- Image Upload Section -->
                <div class="col-lg-5">
                    <h5 class="fw-bold mb-3">Product Image</h5>

                    <!-- Simulated Upload Area -->
                    <div class="upload-box mb-3" onclick="document.getElementById('fileInput').click()">
                        <i class="bi bi-cloud-arrow-up fs-1 mb-2"></i>
                        <p class="mb-0 fw-medium">Click to upload image</p>
                        <small class="opacity-75">PNG, JPG up to 10MB</small>
                        <input type="file" name="image" id="fileInput" required>
                    </div>

                    <!-- Thumbnails Preview (Static) -->
                    <div class="d-flex gap-2">
                        <div class="ratio ratio-1x1 rounded border bg-white" style="width: 80px;">
                            <div class="d-flex align-items-center justify-content-center text-muted"><i
                                    class="bi bi-image"></i></div>
                        </div>
                        <div class="ratio ratio-1x1 rounded border bg-white" style="width: 80px;">
                            <div class="d-flex align-items-center justify-content-center text-muted"><i
                                    class="bi bi-plus"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Product Details Form -->
                <div class="col-lg-7">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold m-0">Add New Product</h2>


                        <input type="submit" name="submit" class="btn btn-primary-custom px-4" value="Publish Product" >


                    </div>

                    <div class="card card-custom p-4 border-0">
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Product Name</label>

                            <input type="text" name="name" class="form-control form-control-lg"
                                placeholder="e.g. Nike Air Max" required>

                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Category</label>
                                <select class="form-select" name="category_id">

                                    <?php

                                    while ($row = $stmt->fetch()) {

                                       echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';

                                    }


                                    ?>
                                    

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Price ($)</label>
                                <input type="number" name="price" class="form-control" placeholder="0.00" required>
                            </div>
                        </div>


                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Stock Quantity</label>
                                <input type="number" name="quantity" class="form-control" placeholder="100" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Discount (%)</label>
                                <input type="number" name="discount" class="form-control" placeholder="0%" value="0">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Description</label>
                            <textarea class="form-control" rows="6" name="pro_desc"
                                placeholder="Describe the product features, specs, and benefits..." required></textarea>
                        </div>

                        <div class="form-check text-muted small">
                            <input class="form-check-input" type="checkbox" id="feature" name="is_featured"  >
                            <label class="form-check-label" for="feature">Make this product featured on homepage</label>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple script to show localized preview if user selects file (just adds name for visual feedback)
        const fileInput = document.getElementById('fileInput');
        const uploadBox = document.querySelector('.upload-box');

        fileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const p = uploadBox.querySelector('p');
                p.textContent = "Selected: " + this.files[0].name;
                uploadBox.classList.add('border-primary', 'text-primary');
            }
        });
    </script>
</body>

</html>