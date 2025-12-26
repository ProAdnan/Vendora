<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Vendora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar (Logged In) -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">Vendora.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="products.html">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=0D8ABC&color=fff"
                                class="rounded-circle me-2" width="32" height="32" alt="User">
                            <span>John Doe</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                            <li><a class="dropdown-item" href="profile.html">My Profile</a></li>
                            <li><a class="dropdown-item" href="admin_dashboard.html">Admin Dashboard</a></li>
                            <!-- For demo purposes -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="index.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold m-0">My Profile</h2>
                    <a href="profile_edit.html" class="btn btn-primary-custom"><i
                            class="bi bi-pencil-square me-2"></i>Edit Profile</a>
                </div>

                <div class="card card-custom p-4">
                    <div class="d-flex flex-column flex-md-row align-items-center mb-5">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&size=128&background=0D8ABC&color=fff"
                            class="rounded-circle shadow-sm mb-3 mb-md-0 me-md-4" alt="Profile">
                        <div class="text-center text-md-start">
                            <h3 class="fw-bold mb-1">John Doe</h3>
                            <span
                                class="badge bg-primary-custom bg-opacity-10 text-primary-custom px-3 py-1 rounded-pill">Customer</span>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="text-muted small fw-bold text-uppercase mb-1">Username</label>
                            <p class="fs-5 fw-medium">johndoe123</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small fw-bold text-uppercase mb-1">Email Address</label>
                            <p class="fs-5 fw-medium">john.doe@example.com</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small fw-bold text-uppercase mb-1">Gender</label>
                            <p class="fs-5 fw-medium">Male</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small fw-bold text-uppercase mb-1">Password</label>
                            <p class="fs-5 fw-medium text-muted">•••••••••••</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted small fw-bold text-uppercase mb-1">Registration Date</label>
                            <p class="fs-5 fw-medium">Dec 25, 2025</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>