<?php

session_start();
require_once __DIR__ . './../classes/Database.php';
require_once __DIR__ . './../classes/Product.php';



if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    die('Err send product information');

}



if (isset($_POST['submit'])) {




    $cat_name = htmlspecialchars(trim($_POST['category']));


    
       

    if (!empty($cat_name)) {

        $product = new Product();

        $result = $product->add_category($cat_name);

        if (!$result) {

            die('Failed to add category');

        }

    } else {

        die('Values is empty!');

    }


} else {

    die("NO submit found!");

}




echo "<script>alert(\"category Created !\")</script>";

header("Location: admin_dashboard.php");
exit;


?>