<?php


require_once __DIR__ . './../classes/Database.php';
require_once __DIR__ . './../classes/Product.php';

$id = (int) $_GET['id'];



$product = new Product();


$product->delete_user($id);


header('Location: admin_dashboard.php');

exit;

?>