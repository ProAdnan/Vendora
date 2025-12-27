<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../classes/User.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    $email = trim($_POST["email"]);

    $password = trim($_POST["password"]);

    $result = User::login($email, $password);


        if ($result) {
        $_SESSION['login_error'] = $result;
        header("Location: login.php");
        exit;
    }
}else {

    User::logout();
        header("Location: ../index.php");

}


?>