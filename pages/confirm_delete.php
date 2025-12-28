
<?php

session_start();


$id= (int) $_GET["id"];




?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product | Vendora Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./../assets/css/style.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 280px;
            flex-shrink: 0;
            background: white;
            border-right: 1px solid #eee;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
        }

        .main-content {
            flex-grow: 1;
            margin-left: 280px;
            padding: 2rem;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .delete-card {
            max-width: 500px;
            margin: 0 auto;
            text-align: center;
        }

        .delete-icon {
            width: 80px;
            height: 80px;
            background-color: #fee2e2;
            color: #dc2626;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
        }

        @media (max-width: 991px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar (Reused for consistency) -->
        <div class="sidebar d-flex flex-column p-3">
            <a href="index.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none px-2">
                <span class="fs-4 fw-bold text-primary-custom">Vendora Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="admin_dashboard.html" class="nav-link text-dark">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="admin_dashboard.html" class="nav-link active">
                        <i class="bi bi-box-seam me-2"></i> Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-dark">
                        <i class="bi bi-tags me-2"></i> Categories
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-dark">
                        <i class="bi bi-people me-2"></i> Users
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-dark">
                        <i class="bi bi-cart me-2"></i> Orders
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=random" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>Admin User</strong>
                </a>
                <ul class="dropdown-menu shadow">
                    <li><a class="dropdown-item" href="index.html">Sign out</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content d-flex align-items-center">

            <div class="container">
                <div class="card card-custom p-5 border-0 delete-card">
                    <div class="delete-icon">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Delete Product?</h3>
                    <p class="text-muted mb-4">
                        Are you sure you want to delete This Product?
                        This action cannot be undone and will remove the product from the store permanently.
                    </p>

                    <div class="d-flex gap-3 justify-content-center">
                        <a href="./admin_dashboard.php" class="btn btn-light border px-4">Cancel</a>
                        <a href="./delete_product.php?id=<?= $id ?>" class="btn btn-danger px-4">Delete Product</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>