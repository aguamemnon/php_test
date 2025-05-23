<?php

namespace Application\Controller;
use PDO;

   // session_start();

require_once  __DIR__ .'/../model/User.php';
require_once  __DIR__ .'/../model/Database.php';
//require_once __DIR__ .'/CSRF.php';

use Application\Security\CSRF;
use Application\Database;

class LoginController {
    public function showLogin() {
        require_once './view/login.php';
    }

    public function loginUser() {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
           $token = $_POST['csrfToken'];
           $config = include __DIR__ . '/../config/application.php';
          $csrf = new CSRF($_SESSION, $config['security']['csrf']['secret_key']);
        if (!$csrf->validateToken($token)) {
            $_SESSION['error'] = 'Token CSRF non valide toto';
            header('Location: /login');
            exit();
        }

        $stmt = Database::getInstance()->query(
            "SELECT * FROM users WHERE username = ?",
            [$username]
        );
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && md5($password) === $user['password']) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'license_key' => $user['license_key']
            ];
            header('Location: /dashboard');
        } else {
            $_SESSION['error'] = 'Identifiants invalides';
            header('Location: /login');
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: login');
    }
}