<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Offers | Vendora</title>
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

    <!-- Header -->
    <div class="bg-danger text-white py-4 mb-5">
        <div class="container text-center">
            <h1 class="fw-bold">Flash Sales & Discounts</h1>
            <p class="m-0 opacity-75">Grab your favorites at unbeatable prices. Limited time only!</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 mb-4">
                <div class="filter-panel">
                    <h5 class="fw-bold mb-3">Filter Offers</h5>

                    <div class="mb-4">
                        <label class="form-label small text-muted fw-bold">Discount Amount</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discount" id="d1" checked>
                            <label class="form-check-label" for="d1">All Deals</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discount" id="d2">
                            <label class="form-check-label" for="d2">50% or more</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discount" id="d3">
                            <label class="form-check-label" for="d3">30% or more</label>
                        </div>
                    </div>

                    <h5 class="fw-bold mb-3">Categories</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-dark fw-medium">All</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Electronics</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Fashion</a></li>
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-lg-9">
                <div class="row g-4">
                    <!-- Item 1 -->
                    <div class="col-md-4">
                        <div class="card card-custom h-100 position-relative">
                            <!-- Discount Badge -->
                            <span
                                class="position-absolute top-0 start-0 m-3 badge bg-danger text-white py-2 px-3 rounded-pill shadow-sm">-30%</span>

                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=400"
                                class="card-img-top" alt="Product">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">Nike Air Red</h5>
                                <div class="mb-2 text-warning small">
                                    <i class="bi bi-star-fill"></i> 4.5
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted text-decoration-line-through me-2">$120.00</small>
                                        <span class="price-text text-danger">$84.00</span>
                                    </div>
                                    <a href="product-details.html" class="btn btn-sm btn-outline-danger"><i
                                            class="bi bi-bag-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-md-4">
                        <div class="card card-custom h-100 position-relative">
                            <span
                                class="position-absolute top-0 start-0 m-3 badge bg-danger text-white py-2 px-3 rounded-pill shadow-sm">-15%</span>
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=400"
                                class="card-img-top" alt="Product">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">Premium Headphones</h5>
                                <div class="mb-2 text-warning small">
                                    <i class="bi bi-star-fill"></i> 4.8
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted text-decoration-line-through me-2">$250.00</small>
                                        <span class="price-text text-danger">$212.50</span>
                                    </div>
                                    <a href="product-details.html" class="btn btn-sm btn-outline-danger"><i
                                            class="bi bi-bag-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="col-md-4">
                        <div class="card card-custom h-100 position-relative">
                            <span
                                class="position-absolute top-0 start-0 m-3 badge bg-danger text-white py-2 px-3 rounded-pill shadow-sm">-50%</span>
                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=400"
                                class="card-img-top" alt="Product">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">Classic Watch</h5>
                                <div class="mb-2 text-warning small">
                                    <i class="bi bi-star-fill"></i> 4.2
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted text-decoration-line-through me-2">$180.00</small>
                                        <span class="price-text text-danger">$90.00</span>
                                    </div>
                                    <a href="product-details.html" class="btn btn-sm btn-outline-danger"><i
                                            class="bi bi-bag-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="col-md-4">
                        <div class="card card-custom h-100 position-relative">
                            <span
                                class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark py-2 px-3 rounded-pill shadow-sm">Hot
                                Deal</span>
                            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=400"
                                class="card-img-top" alt="Product">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">Polaroid Camera</h5>
                                <div class="mb-2 text-warning small">
                                    <i class="bi bi-star-fill"></i> 4.7
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted text-decoration-line-through me-2">$99.00</small>
                                        <span class="price-text text-danger">$79.00</span>
                                    </div>
                                    <a href="product-details.html" class="btn btn-sm btn-outline-danger"><i
                                            class="bi bi-bag-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>