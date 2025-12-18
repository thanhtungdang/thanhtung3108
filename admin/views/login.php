<?php
if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Dashboard</title>
    <link rel="stylesheet" href="views/assets/css/bootstrap.css">
    <link rel="stylesheet" href="views/assets/css/app.css">
    <link rel="stylesheet" href="views/assets/css/pages/auth.css">
</head>
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Đăng nhập quyền Admin</p>

                    <form action="index.php?action=loginSubmit" method="POST">
                        <div class="form-group mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                        </div>
                        
                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif; ?>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Đăng nhập</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
</body>
</html>