<style>
    .search-input {
        width: 100%;
        max-width: 220px;
        height: 45px;
        padding: 12px;
        border-radius: 12px;
        border: 1.5px solid lightgrey;
        outline: none;
        transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
        box-shadow: 0px 0px 20px -18px;
    }

    .search-input:hover {
        border: 2px solid lightgrey;
        box-shadow: 0px 0px 20px -17px;
    }

    .search-input:active {
        transform: scale(0.95);
    }

    .search-input:focus {
        border: 2px solid grey;
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="./../index.php">Vendora.</a>

        <form action="./products.php">
            <input placeholder="Searth the products..." type="text" name="search" class="search-input">
            <input type="submit" class="btn btn-primary-custom" name="submit" id="" value="Search">

        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAdmin">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="./products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="./../index.php#services">Services</a></li>
                <li class="nav-item ms-lg-3">
                    <a href="./admin_dashboard.php" class="btn btn-primary-custom">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
</nav>