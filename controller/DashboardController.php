<?php
namespace Application\Controller;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once  __DIR__ . '/../model/User.php';
require_once  __DIR__ . '/../model/Auth.php';
require_once  __DIR__ . '/../model/SoftwareLicenseManager.php';
use SoftwareLicenseManager;
use Application\Model\Auth;
use Application\Model\User;
class DashboardController {
    protected $auth;

    public function __construct() {
        $this->auth = new Auth();
    }

    public function showDashboard() {
        if (!$this->auth->check()) {
            header('Location: /login');
            exit();
        }

        $userManager = new SoftwareLicenseManager();
        $licenseStatus = $userManager->checkLicense($this->auth->user()->license_key);
      
        $userData = $userManager->getUserData($this->auth->user()->id);


        if (!$licenseStatus['status']) {
            if ($licenseStatus['data']['status_code'] === 1) {
                return redirect('/license/expired');
            } elseif ($licenseStatus['data']['status_code'] === 2) {
                return redirect('/license/invalid');
            }
        }

  if ($userData) {
        $user = $userData; // Passage de la variable $user à la vue
        require_once  __DIR__ .'/../view/dashboard.php';
   
       
    } else {
        $_SESSION['error'] = 'Erreur lors de la récupération des informations utilisateur';
        header('Location: /login');
        exit();
    }

   
    }
}