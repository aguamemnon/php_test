<?php
ob_clean();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use Application\Security\CSRF;
use Application\Controller\LoginController;
use Application\Controller\DashboardController;
use Application\Controller\ProfileController;
use Application\Controller\AdminController;
use Application\Controller\LicenseController;




// Configuration des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Configuration de la sécurité
$config =  include __DIR__ .  '/config/application.php';
//rint_r($config); // Pour debug
$csrf = new CSRF($_SESSION, $config['security']['csrf']['secret_key']);

// Vérifier si les variables de requête existent
$requestUri = isset($_SERVER['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '/'; 
$requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

// Contrôleurs disponibles
$controllers = [
    '' => [LoginController::class, 'showLogin'],
    '/' => [LoginController::class, 'showLogin'],
    '/login' => [LoginController::class, 'showLogin'],
    '/login/submit' => [LoginController::class, 'loginUser'],
    '/logout' => [LoginController::class, 'logout'],
    '/dashboard' => [DashboardController::class, 'showDashboard'],
    '/profile' => [ProfileController::class, 'showProfile'],
    '/admin' => [AdminController::class, 'showAdmin'],
    '/license' => [LicenseController::class, 'showLicense'],
    '/license/validate' => [LicenseController::class, 'validateLicense'],
    '/license/renew' => [LicenseController::class, 'renewLicense'],
];

// // Gérer la redirection par défaut
// if (!isset($controllers[$requestUri])) {
//     // Si la route n'est pas trouvée, rediriger vers le login
//     header('Location: /login');
//     exit();
// }

if (isset($controllers[$requestUri])) {
    $controller = new $controllers[$requestUri][0];
    $method = $controllers[$requestUri][1];
    
    
    $controller->$method();
} else {
    http_response_code(404);
    echo "Page non trouvée index " & $requestMethod   ;
}