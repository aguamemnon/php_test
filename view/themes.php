<?php
session_start();
require_once __DIR__.'/../controller/ThemeController.php';

    $theme = isset($_SESSION['user']['theme']) ? $_SESSION['user']['theme'] : 'default';
 require_once __DIR__.'/header.php'; 
 require_once __DIR__.'/menu.php';?>

        <div class="content-wrapper">
            <section class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Configuration du thème</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/theme/set">
                                <div class="form-group">
                                    <label>Sélectionnez un thème :</label>
                                    <select name="theme" class="form-control">
                                        <option value="default" <?php if ($theme === 'default') echo 'selected'; ?>>Défaut</option>
                                        <option value="dark" <?php if ($theme === 'dark') echo 'selected'; ?>>Noir</option>
                                        <option value="light" <?php if ($theme === 'light') echo 'selected'; ?>>Clair</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Appliquer le thème</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php
 require_once __DIR__.'/footer.php'; ?>
