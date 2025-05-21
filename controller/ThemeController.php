<?php
namespace Application\Controller;

session_start();
require_once 'model/User.php';
require_once 'model/Database.php';

class ThemeController {
    public function showThemes() {
        if (!isset($_SESSION['user'])) {
            return redirect('login');
        }

        require_once 'view/themes.php';
    }

    public function setTheme() {
        if (!isset($_SESSION['user'])) {
            return redirect('login');
        }

        $theme = filter_var($_POST['theme'], FILTER_SANITIZE_STRING);
        Database::getInstance()->query(
            "UPDATE users SET theme = ? WHERE id = ?",
            [$theme, $_SESSION['user']['id']]
        );

        $_SESSION['user']['theme'] = $theme;
        return redirect('profile');
    }
}
