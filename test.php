<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application AdminLTE</title>
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css" rel="stylesheet">
    <!-- Ajout des styles nécessaires -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Barre latérale -->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="#" class="brand-link">
                    <img src="../../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
                    <span class="brand-text fw-light">AdminLTE 4</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <!-- Menu de navigation -->
                <nav>
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview">
                        <!-- Votre menu ici -->
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- En-tête -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Contenu -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="m-0">Titre de la page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item active">Titre de la page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenu principal -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Votre contenu ici -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Titre de la carte</h3>
                                </div>
                                <div class="card-body">
                                    <p>Contenu de la carte</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>