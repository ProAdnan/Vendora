
 <link href="./../assets/css/style.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="./../index.php">Vendora.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavUser">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavUser">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="./products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="./../index.php#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="./../index.php#contact">Contact Us</a></li>
                <li class="nav-item ms-lg-3 dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 me-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="./orders.php">My Cart</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger"  href="./loginProcess.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>   