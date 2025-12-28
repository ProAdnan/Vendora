<?php

require_once __DIR__ . './../classes/Database.php';
require_once __DIR__ . './../classes/Product.php';



if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    die('Err send product information');

}



if (isset($_POST['submit'])) {

    $id = $_POST['product_id'];

    $product_obj = new Product();

    $old_image_path= $product_obj->get_old_image_path($id);



    $product_name = htmlspecialchars(trim($_POST['name']));


    if (isset($_POST['price'])) {

        if ($_POST['price'] > 0) {

            $price = htmlspecialchars(trim($_POST['price']));

        } else {

            die('price must be a positive value!');

        }

    } else {

        die('Price must set !');

    }




    if (isset($_POST['quantity'])) {


        if ($_POST['quantity'] > 0) {

            $quantity = htmlspecialchars(trim($_POST['quantity']));

        } else {

            die('quantity must be positive');

        }

    } else {

        die('quantity must set');

    }


    $product_description = htmlspecialchars(trim($_POST['pro_desc']));

    if ($_POST['category_id'] != "0") {

        $category_id = $_POST['category_id'];

    } else {

        die('categorie must set');
    }

    $table;

    if (isset($_POST['discount'])) {

        $discount = $_POST['discount'];



        if (empty($discount)) {
            $table = "products";

        } else {
            $table = "discounts";
        }

    }




    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

        $file = $_FILES['image'];

        if ($file['error'] !== 0) {
            die("Upload error img");

        }


        if ($file['size'] > 10 * 1024 * 1024) {   //2 MB
            die("File too large");

        }

        $allowed = ['image/jpeg', 'image/png'];

        if (!in_array($file['type'], $allowed)) {

            die("Invalid type");

        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        $path_name = uniqid("img_") . "." . $ext;

        move_uploaded_file($file['tmp_name'], "./../assets/img/" . $path_name);

        $image_path = $path_name;

    } else {


        $image_path =  $old_image_path['image_path']; 

    }





    $is_featured = isset($_POST['is_featured']) ? 1 : 0;




    if (!empty($product_name) && !empty($price) && !empty($product_description)) {



        $product = new Product();


        $product_id = $product->update_product($product_name, $price, $quantity, $product_description, $category_id, $image_path, $is_featured, $id);


        if (!empty($_POST['discount'])) {

            $discount = (int) $_POST['discount'];
            $start = $_POST['discount_start'] ?? null;
            $end = $_POST['discount_end'] ?? null;

            $product->update_Discount($discount, $start, $end, $product_id);

        }



        if (!$product_id) {

            die('Failed to create product');

        }

    } else {

        die('Values is empty!');

    }


} else {

    die("NO submit found!");

}




echo "<script>alert(\"Product Created !\")</script>";

header("Location: admin_dashboard.php");
exit;


?>