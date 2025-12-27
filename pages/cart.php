
<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | Vendora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">Vendora.</a>
            <a class="nav-link" href="./products.php"><i class="bi bi-arrow-left me-1"></i> Continue Shopping</a>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="fw-bold mb-4">Shopping Cart (2)</h2>

        <div class="row">
            <div class="col-lg-8">
                <!-- Cart Item 1 -->
                <div class="card card-custom p-3 mb-3 border-0">
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=200"
                            class="rounded me-3" width="80" height="80" alt="Product">
                        <div class="flex-grow-1">
                            <h6 class="fw-bold m-0">Nike Air Red</h6>
                            <small class="text-muted">Size: 42</small>
                        </div>
                        <div class="px-3">
                            <input type="number" class="form-control text-center" value="1" min="1"
                                style="width: 70px;">
                        </div>
                        <div class="fw-bold text-primary-custom px-3">$120.00</div>
                        <button class="btn btn-sm text-danger"><i class="bi bi-trash"></i></button>
                    </div>
                </div>

                <!-- Cart Item 2 -->
                <div class="card card-custom p-3 mb-3 border-0">
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=200"
                            class="rounded me-3" width="80" height="80" alt="Product">
                        <div class="flex-grow-1">
                            <h6 class="fw-bold m-0">Headphones</h6>
                            <small class="text-muted">Color: Black</small>
                        </div>
                        <div class="px-3">
                            <input type="number" class="form-control text-center" value="1" min="1"
                                style="width: 70px;">
                        </div>
                        <div class="fw-bold text-primary-custom px-3">$250.00</div>
                        <button class="btn btn-sm text-danger"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-custom p-4 border-0">
                    <h5 class="fw-bold mb-4">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2 text-muted">
                        <span>Subtotal</span>
                        <span>$370.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-muted">
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4 text-muted">
                        <span>Tax</span>
                        <span>$0.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4 fs-5 fw-bold">
                        <span>Total</span>
                        <span class="text-primary-custom">$370.00</span>
                    </div>
                    <a href="./payment.php" class="btn btn-primary-custom w-100 py-2">Proceed to Checkout</a>
                    <div class="text-center mt-3 small text-muted">
                        <i class="bi bi-shield-lock me-1"></i> Secure Checkout
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>