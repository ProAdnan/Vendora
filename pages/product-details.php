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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="./../index.php">Vendora.</a>
            <div class="d-flex align-items-center">
                <a class="nav-link me-3" href="./cart.php"><i class="bi bi-cart3 fs-5"></i> <span
                        class="badge bg-danger rounded-pill custom-badge">2</span></a>
                <a class="btn btn-sm btn-outline-secondary" href="./products.php">Back to Shop</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row g-5">
            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="card card-custom border-0 p-3">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=1000"
                        class="img-fluid rounded" alt="Product Image">
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <span class="badge bg-primary-custom bg-opacity-10 text-primary-custom px-3 py-2 rounded-pill mb-3">In
                    Stock</span>
                <h1 class="fw-bold mb-2">Nike Air Red</h1>
                <div class="mb-3">
                    <span class="text-warning"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-half"></i></span>
                    <span class="text-muted ms-2">(124 reviews)</span>
                </div>
                <h2 class="fw-bold text-primary-custom mb-4">$120.00</h2>

                <p class="text-muted mb-4 lead" style="font-size: 1rem;">
                    Experience ultimate comfort and style with the Nike Air Red. Designed for performance and built for
                    the streets, these sneakers feature breathable mesh, responsive cushioning, and a durable outsole.
                    Perfect for your daily run or casual wear.
                </p>

                <div class="d-flex gap-3 mb-4">
                    <input type="number" class="form-control w-25 text-center" value="1" min="1">
                    <button class="btn btn-primary-custom flex-grow-1" onclick="window.location.href='./cart.php'">Add
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
                <div class="col-md-3">
                    <div class="card card-custom h-100">
                        <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?q=80&w=400"
                            class="card-img-top" style="height: 200px;" alt="Related">
                        <div class="card-body">
                            <h6 class="fw-bold">Nike Green</h6>
                            <span class="text-primary-custom fw-bold">$110.00</span>

                        </div>

                        <a href="./product-details.php" class="btn btn-sm btn-outline-custom">View</a>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-custom h-100">
                        <img src="https://images.unsplash.com/photo-1608231387042-66d1773070a5?q=80&w=400"
                            class="card-img-top" style="height: 200px;" alt="Related">
                        <div class="card-body">
                            <h6 class="fw-bold">Puma Black</h6>
                            <span class="text-primary-custom fw-bold">$90.00</span>
                        </div>

                        <a href="./product-details.php" class="btn btn-sm btn-outline-custom">View</a>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>