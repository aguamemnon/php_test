<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__.'/../controller/DashboardController.php';


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php require_once __DIR__.'/header.php'; ?>
        
        
        <!-- Contenu -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Bienvenue sur votre tableau de bord</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($user)) : ?>
                                       
                                        <p>Bienvenue <?php  echo htmlspecialchars($user->getusername(), ENT_QUOTES, 'UTF-8'); ?></p>
                                    <?php else : ?>
                                        <p>Erreur : Les informations de l'utilisateur ne sont pas disponibles.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/js/adminlte.min.js"></script>
</body>
</html>