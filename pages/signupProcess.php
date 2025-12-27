<?php
require_once __DIR__ . '/../classes/User.php';

$errors = [];
$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    $user->setName(  trim($_POST['name'] ?? '') );
    $user->setEmail  ( trim($_POST['email'] ?? '') );
    $user->setGender ( $_POST['gender'] ?? '' );
    $user->setPassword ( trim($_POST['password'] ?? '') );
    $user->setConfirmPassword ( trim($_POST['confirm_password'] ?? '' ) ); 

    $errors = $user->register();

    if (empty($errors)) {
        header('Location: login.php');
        exit;
    }
}
?>
