
<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details | Vendora Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 280px;
            flex-shrink: 0;
            background: white;
            border-right: 1px solid #eee;
            min-height: 100vh;
        }

        .main-content {
            flex-grow: 1;
            padding: 2rem;
            background-color: #f8f9fa;
        }

        @media (max-width: 991px) {
            .sidebar {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar (Reused for consistency) -->
        <div class="sidebar d-flex flex-column p-3">
            <a href="./../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none px-2">
                <span class="fs-4 fw-bold text-primary-custom">Vendora Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item"><a href="admin_dashboard.html" class="nav-link link-dark"><i
                            class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                <li><a href="admin_dashboard.html" class="nav-link link-dark"><i class="bi bi-box-seam me-2"></i>
                        Products</a></li>
                <li><a href="admin_dashboard.html" class="nav-link link-dark"><i class="bi bi-tags me-2"></i>
                        Categories</a></li>
                <li><a href="admin_dashboard.html" class="nav-link link-dark"><i class="bi bi-people me-2"></i>
                        Users</a></li>
                <li><a href="admin_dashboard.html" class="nav-link active"><i class="bi bi-cart me-2"></i> Orders</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <a href="admin_dashboard.html" class="btn btn-outline-secondary btn-sm me-3"><i
                            class="bi bi-arrow-left"></i> Back</a>
                    <h2 class="fw-bold m-0">Order #8821</h2>
                    <span class="badge bg-warning text-dark ms-3">Processing</span>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary"><i class="bi bi-printer"></i> Print</button>
                    <button class="btn btn-primary-custom">Mark as Shipped</button>
                </div>
            </div>

            <div class="row">
                <!-- Order Items -->
                <div class="col-lg-8">
                    <div class="card card-custom p-0 border-0 overflow-hidden mb-4">
                        <div class="card-header bg-white p-3 border-bottom">
                            <h6 class="m-0 fw-bold">Order Items (2)</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4">Product</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-end pe-4">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Item 1 -->
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=100"
                                                    class="rounded border me-3" width="50" height="50" alt="Prod">
                                                <div>
                                                    <h6 class="m-0 fw-bold small">Nike Air Red</h6>
                                                    <small class="text-muted">Size: 42</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">1</td>
                                        <td class="text-end pe-4 fw-bold">$120.00</td>
                                    </tr>
                                    <!-- Item 2 -->
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=100"
                                                    class="rounded border me-3" width="50" height="50" alt="Prod">
                                                <div>
                                                    <h6 class="m-0 fw-bold small">Headphones</h6>
                                                    <small class="text-muted">Color: Black</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">1</td>
                                        <td class="text-end pe-4 fw-bold">$250.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer bg-white border-top p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-bold">$370.00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Transaction Info -->
                    <div class="card card-custom p-4 border-0">
                        <h6 class="fw-bold mb-3">Transaction Details</h6>
                        <div class="row g-3 text-muted small">
                            <div class="col-6 col-md-3">
                                <div class="fw-bold text-dark">Payment Method</div>
                                <div>Credit Card</div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-bold text-dark">Transaction ID</div>
                                <div>TXN-12345678</div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-bold text-dark">Date</div>
                                <div>Oct 24, 2025</div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-bold text-dark">Amount</div>
                                <div class="text-success">$370.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Info -->
                <div class="col-lg-4">
                    <div class="card card-custom p-4 border-0 mb-4 text-center text-sm-start">
                        <h6 class="fw-bold mb-4">Customer Details</h6>

                        <div class="d-flex align-items-center mb-4">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=random"
                                class="rounded-circle me-3" width="48" height="48">
                            <div>
                                <h6 class="m-0 fw-bold">John Doe</h6>
                                <a href="#" class="small text-primary-custom text-decoration-none">View Profile</a>
                            </div>
                        </div>

                        <div class="mb-3">
                            <i class="bi bi-envelope text-muted me-2"></i>
                            <span class="small">john.doe@example.com</span>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-telephone text-muted me-2"></i>
                            <span class="small">+1 (555) 000-0000</span>
                        </div>

                        <hr>

                        <h6 class="fw-bold mt-4 mb-3">Shipping Address</h6>
                        <p class="text-muted small mb-0">
                            123 Market Street,<br>
                            Suite 400,<br>
                            San Francisco, CA 94103<br>
                            United States
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>