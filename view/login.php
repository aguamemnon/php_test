<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ .'/../controller/CSRF.php';
require_once  __DIR__ .'/../controller/LoginController.php';
use Application\Security\CSRF;
$config = include __DIR__ . '/../config/application.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h3 class="h3">Connexion</h3>
            </div>
            <?php $csrf = new CSRF($_SESSION, $config['security']['csrf']['secret_key']); 
            $csrfToken = $csrf->generateToken();
            ?>
            <form action="/login/submit" method="post">
                <div class="card-body">
                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="csrfToken" value="<?php echo  $csrfToken ; ?>">

                        <button type="submit" class="btn btn-primary">Se Connecter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 <?php   
 ?>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/js/adminlte.min.js"></script>
</body>
</html>