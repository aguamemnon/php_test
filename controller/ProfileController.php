<?php

namespace Application\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Application\Model\Auth;

require_once __DIR__.'/../model/User.php';

class ProfileController {
    public function showProfile() {
        if (!Auth::user()) {
            return redirect('login');
        }

        $user = [
            'id' => Auth::user()->id,
            'username' => Auth::user()->username,
            'email' => Auth::user()->email
        ];

        require_once __DIR__.'/../view/profile.php';
    }
}