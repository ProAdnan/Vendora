<?php

// echo substr(sprintf('%o', fileperms('/tmp')), -4); file permmision

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    die("Invalid request");

}


$file = $_FILES['image'];

if ($file['error'] !== 0) {
    die("Upload error");

}
echo "<pre>";
print_r($file);
echo "</pre>";


if ($file['size'] > 2 * 1024 * 1024) {   //2 MB
    die("File too large");

}

$allowed = ['image/jpeg', 'image/png'];

if (!in_array($file['type'], $allowed)) {

    die("Invalid type");

}

$ext = pathinfo($file['name'], PATHINFO_EXTENSION);

$name = uniqid("img_") . "." . $ext;

move_uploaded_file($file['tmp_name'], "uploads/" . $name);

echo "<h1>Upload success</h1> <br>";
echo "<h1>See Your Uploads folder</h1>";


?>