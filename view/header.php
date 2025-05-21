<?php
session_start();
require_once '../controller/DashboardController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application AdminLTE</title>
    <link href="https://cdn.jsdelivr.net/npm@admin-lte/dist/css/adminlte.min.css" rel="stylesheet">
    <?php
    $theme = isset($_SESSION['user']['theme']) ? $_SESSION['user']['theme'] : 'default';
    if ($theme !== 'default') {
        echo "<link href='https://cdn.jsdelivr.net/npm@admin-lte/dist/css/$theme.min.css' rel='stylesheet'>";
    }
    ?>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="main-sidebar">
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/profile" class="d-block"><?php echo $_SESSION['user']['username']; ?></a>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/profile" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                        <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin') { ?>
                            <li class="nav-item">
                                <a href="/admin" class="nav-link">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>Administration</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/license" class="nav-link">
                                    <i class="nav-icon fas fa-key"></i>
                                    <p>Gestion des licences</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/theme" class="nav-link">
                                    <i class="nav-icon fas fa-palette"></i>
                                    <p>Thèmes</p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- En-tête -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i> Se déconnecter
                    </a>
                </li>
            </ul>
        </nav>
    </div>
