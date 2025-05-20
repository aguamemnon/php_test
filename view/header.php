<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application AdminLTE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- En-tête -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-blue">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="/profile" class="nav-link">Mon Profile</a>
                </li>
                <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin') { ?>
                    <li class="nav-item">
                        <a href="/admin" class="nav-link">Administration</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/logout" class="nav-link">Se déconnecter</a>
                </li>
            </ul>
        </nav>