<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Vendora</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .signup-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #3f37c9 100%);
            height: 300px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
            border-bottom-left-radius: 50% 20px;
            border-bottom-right-radius: 50% 20px;
        }

        .signup-card-container {
            position: relative;
            z-index: 1;
            margin-top: 60px;
            margin-bottom: 60px;
        }
    </style>
</head>

<body>

    <div class="signup-header"></div>

    <div class="container signup-card-container">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="text-center mb-4 text-white">
                    <h2 class="fw-bold">Join Vendora</h2>
                    <p class="opacity-75">Create an account to start your shopping journey.</p>
                </div>

                <div class="card card-custom p-4 p-md-5">
                    <form action="login.html" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="username" class="form-label text-muted small fw-bold">Username</label>
                            <input type="text" class="form-control" id="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-muted small fw-bold">Email Address</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label text-muted small fw-bold">Gender</label>
                            <select class="form-select" id="gender" required>
                                <option value="" selected disabled>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label text-muted small fw-bold">Password</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirm_password" class="form-label text-muted small fw-bold">Retype
                                    Password</label>
                                <input type="password" class="form-control" id="confirm_password" required>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label small text-muted" for="terms">
                                I agree to the <a href="#" class="text-primary-custom">Terms of Service</a> and <a
                                    href="#" class="text-primary-custom">Privacy Policy</a>.
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100 mb-3">Create Account</button>

                        <div class="text-center">
                            <span class="text-muted small">Already have an account? </span>
                            <a href="./login.php" class="small fw-bold text-primary-custom">Log in</a>
                        </div>
                    </form>
                </div>

                <div class="text-center mt-4">
                    <a href="./../index.php" class="text-muted small text-decoration-none"><i class="bi bi-house me-1"></i>
                        Back to Home</a>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple Bootstrap validation
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>