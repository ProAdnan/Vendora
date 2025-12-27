<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';
$db = Database::getInstance()->getConnection();
if (isset($_GET["submit"])) {
    $userId = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$userId]);
    $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

}

 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {

    $errors = [];
        $user = new User();
        $user->setName(trim($_POST['name'] ?? ''));
        $user->setEmail(trim($_POST['email'] ?? ''));
        $user->setGender($_POST['gender'] ?? $_POST['gender_current']);
        $user->setPassword(trim($_POST['password'] ?? ''));
        $user->setConfirmPassword(trim($_POST['confirm_password'] ?? ''));
        if ($user->getPassword()) {
            $errors = $user->updateAll();
        } else {
            $errors = $user->updateWithoutPassword();
        }
        if (!$errors) {
            header('location:profile.php');
        } else {

        }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | Vendora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">Vendora.</a>
            <div class="ms-auto">
                <a href="profile.php" class="btn btn-sm btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="mb-4">
                    <h2 class="fw-bold">Edit Profile</h2>
                    <p class="text-muted">Update your personal information.</p>
                </div>

                <div class="card card-custom p-4">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?= htmlspecialchars($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">

                        <!-- Avatar Upload Simulation -->
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block">
                                <img src="https://ui-avatars.com/api/?name=John+Doe&size=128&background=0D8ABC&color=fff"
                                    class="rounded-circle shadow-sm" alt="Profile">
                                <button type="button"
                                    class="btn btn-sm btn-primary-custom rounded-circle position-absolute bottom-0 end-0 shadow">
                                    <i class="bi bi-camera"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label text-muted small fw-bold">Name</label>
                                <input type="text" name="name" class="form-control" id="username"
                                    value="<?= htmlspecialchars($userRow['name']) ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label text-muted small fw-bold">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="<?= htmlspecialchars($userRow['email']) ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label text-muted small fw-bold">Gender</label>
                                <select class="form-select" name="gender" id="gender">
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="gender_current" class="form-label text-muted small fw-bold">Gender</label>
                                <input type="gender_current" name="gender_current" class="form-control"
                                    id="gender_current" value="<?= htmlspecialchars($userRow['gender']) ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label text-muted small fw-bold">New Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Leave blank to keep current">
                            </div>
                            <div class="col-md-6">
                                <label for="confirm_password" class="form-label text-muted small fw-bold">Confirm
                                    Password</label>
                                <input type="confirm_password" name="confirm_password" class="form-control"
                                    id="confirm_password" placeholder="Leave blank to keep current">
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end gap-2">
                            <a href="profile.php" class="btn btn-light">Cancel</a>
                            <button type="submit" name="save" value="save" class="btn btn-primary-custom px-4">Save
                                Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>