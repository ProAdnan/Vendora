<?php


require_once __DIR__ . './../classes/Database.php';
require_once __DIR__ . './../classes/Product.php';

$id = (int) $_GET['id'];



$product = new Product();


$products = $product->read_by_category($id);

$nums = $products->rowCount();

if ($nums > 0) {
  
    echo '<script>
        alert("You cannot delete this category because it has products.");
        window.history.back();
    </script>';

} else {

    $product->delete_cat($id);

    header('Location: admin_dashboard.php');
}



exit;

?>