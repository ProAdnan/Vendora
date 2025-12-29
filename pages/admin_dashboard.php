<?php

session_start();


require_once __DIR__ . './../classes/Database.php';
require_once __DIR__ . './../classes/Product.php';



$product = new Product();



$total_income = $product->calculate_OrderItems();

$number_of_categories = $product->calculate_categories();

$number_of_orders = $product->num_of_orders();

$number_of_users = $product->num_of_users();

$all_users = $product->read_all_users();

$all_products = $product->readAll();

$num_of_products = $all_products->rowCount();

$all_categories = $product->read_all_category();



$all_orders = $product->read_all_orders();
$num_of_orders = $all_orders->rowCount();




$orders_users_join= $product->get_user_with_order();

$nums_orders_users= $orders_users_join->rowCount();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Vendora</title>
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

        @media (max-width: 991px) {
            .sidebar {
                display: none;
                /* Can implement mobile toggle if needed, hiding for simplicity on mobile in this snippet or using offcanvas */
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column p-3">
            <a href="./admin_dashboard.php"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none px-2">
                <span class="fs-4 fw-bold text-primary-custom">Vendora Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto" id="adminTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active w-100 text-start" id="dashboard-tab" data-bs-toggle="pill"
                        data-bs-target="#dashboard" type="button" role="tab"><i class="bi bi-speedometer2"></i>
                        Dashboard</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link w-100 text-start" id="products-tab" data-bs-toggle="pill"
                        data-bs-target="#products" type="button" role="tab"><i class="bi bi-box-seam"></i>
                        Products</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link w-100 text-start" id="categories-tab" data-bs-toggle="pill"
                        data-bs-target="#categories" type="button" role="tab"><i class="bi bi-tags"></i>
                        Categories</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link w-100 text-start" id="users-tab" data-bs-toggle="pill"
                        data-bs-target="#users" type="button" role="tab"><i class="bi bi-people"></i> Users</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link w-100 text-start" id="orders-tab" data-bs-toggle="pill"
                        data-bs-target="#orders" type="button" role="tab"><i class="bi bi-cart"></i> Orders</button>
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
                    <li><a class="dropdown-item" href="./../index.php">Back To Site</a></li>

                    <li><a class="dropdown-item" href="loginProcess.php">Sign out</a></li>

                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">

            <div class="tab-content" id="adminTabsContent">

                <!-- DASHBOARD SUMMARY -->
                <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                    <h2 class="fw-bold mb-4">Dashboard Overview</h2>
                    <div class="row g-4 mb-5">
                        <div class="col-md-3">
                            <div class="card card-custom p-4 border-0">
                                <h6 class="text-muted text-uppercase small fw-bold">Total Income</h6>
                                <h3 class="fw-bold text-primary-custom"><?php echo $total_income; ?></h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-custom p-4 border-0">
                                <h6 class="text-muted text-uppercase small fw-bold">Categories</h6>
                                <h3 class="fw-bold"><?php echo $number_of_categories; ?></h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-custom p-4 border-0">
                                <h6 class="text-muted text-uppercase small fw-bold">Orders</h6>
                                <h3 class="fw-bold"><?php echo $number_of_orders; ?></h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-custom p-4 border-0">
                                <h6 class="text-muted text-uppercase small fw-bold">Customers</h6>
                                <h3 class="fw-bold"><?php echo $number_of_users; ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom p-4 border-0">
                        <h5 class="fw-bold mb-3">Recent Revenue</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Oct 24, 2025</td>
                                        <td>Shoe Sale #1234</td>
                                        <td><span class="badge bg-success bg-opacity-10 text-success">Completed</span>
                                        </td>
                                        <td>$120.00</td>
                                    </tr>
                                    <tr>
                                        <td>Oct 23, 2025</td>
                                        <td>Electronics Order #1233</td>
                                        <td><span class="badge bg-warning bg-opacity-10 text-warning">Pending</span>
                                        </td>
                                        <td>$450.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTS -->
                <div class="tab-pane fade" id="products" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold">Products</h2>

                        <a href="./add_product.php" class="btn btn-primary-custom">Create Product</a>

                    </div>
                    <div class="row g-4">


                        <?php
                        if ($num_of_products > 0) {


                            while ($product = $all_products->fetch()) {


                                echo <<<EOT

                        <div class="col-md-4 col-lg-3">
                            <div class="card card-custom h-100">
                                <img src="./../assets/img/{$product['image_path']}"
                                    class="card-img-top" alt="Product" style="height: 180px;">
                                <div class="card-body">
                                    <h6 class="fw-bold">{$product['product_name']}</h6>
                                    <p class="text-primary-custom fw-bold">{$product['price']}$</p>
                                    <div class="d-flex gap-2">
                                             <a href="./product-details.php?id={$product['product_id']}&cat={$product['category_id']}" class="btn btn-sm btn-outline-secondary w-50">View</a>

                                             <a href="./edit_product.php?id={$product['product_id']}&cat={$product['category_id']}" class="btn btn-sm btn-outline-secondary w-50">Edit</a>

                                            <a href="./confirm_delete.php?id={$product['product_id']}" class="btn btn-sm btn-outline-danger w-50">Delete</a>


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
                </div>

                <!-- CATEGORIES -->
                <div class="tab-pane fade" id="categories" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold">Categories</h2>

                        <a href="./add_category.php" class="btn btn-primary-custom"><i class="bi bi-plus-lg me-1"></i>
                            Add Category</a>



                    </div>
                    <div class="row g-3">


                        <?php

                        if ($number_of_categories > 0) {

                            while ($cats = $all_categories->fetch()) {

                                echo <<<EOT

<div class="col-md-4">
                            <div
                                class="card card-custom p-3 border-0 d-flex flex-row align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary-custom bg-opacity-10 text-primary-custom p-2 rounded me-3">
                                        <i class="bi bi-laptop"></i>
                                    </div>
                                    <h6 class="m-0 fw-bold">{$cats['category_name']}</h6>
                                </div>
                                <a class="btn btn-sm text-danger" href="./delete_cat.php?id={$cats['category_id']}"><i class="bi bi-trash"></i></a>
                                
                            </div>
                        </div>



EOT;

                            }


                        } else {


                            echo 'No Categories Found';

                        }


                        ?>






                    </div>
                </div>

                <!-- USERS -->
                <div class="tab-pane fade" id="users" role="tabpanel">
                    <h2 class="fw-bold mb-4">Registered Users</h2>



                    <?php

                    if ($number_of_users > 0) {


                        while ($user = $all_users->fetch()) {
                            echo <<<EOT

                                     <div class="card card-custom border-0">
<div class="card-body">

<div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=U" class="rounded-circle me-3"
                                    width="40" height="40">
                                <div>
                                    <h6 class="m-0 fw-bold">{$user['name']}</h6>
                                    <small class="text-muted">{$user['email']}</small>
                                </div>
                                <div class="ms-auto text-muted small">Registerd at : {$user['register_date']}</div>
                               <a class="btn btn-sm text-danger" href="./delete_user.php?id={$user['user_id']}"><i class="bi bi-trash"></i></a>

                            </div>
                        </div>

                </div><br>

EOT;


                        }



                    } else {


                        echo '<p>No Users Registered';
                    }


                    ?>








                </div>

                <!-- ORDERS -->
                <div class="tab-pane fade" id="orders" role="tabpanel">
                    <h2 class="fw-bold mb-4">Recent Orders</h2>
                    <div class="row g-3">


                        <?php
                        if ($nums_orders_users > 0) {

                            while ($orders = $orders_users_join->fetch()) {

                                

                                        echo <<<EOT

<div class="col-12">
                            <div class="card card-custom p-3 border-0">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <div>
                                        <h6 class="fw-bold m-0">Order {$orders['order_id']}</h6>
                                        <small class="text-muted">By {$orders['name']} </small>
                                    </div>
                                    
                                    <div class="fw-bold">$125.00</div>
                                    <div>
                                        <button class="btn btn-sm btn-light border me-1"><a
                                                href="./admin_order_details.php?id_order={$orders['order_id']}&id_user={$orders['user_id']}">View</a></button>
                                        <button class="btn btn-sm btn-outline-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

EOT;
                                    
                                

                            }



                        } else {

                            echo '<p>No Orders Yet</p>';

                        }




                        ?>








                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>