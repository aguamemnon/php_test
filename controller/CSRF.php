<?php
namespace Application\Security;

class CSRF {
    private $session;
    private $secretKey;

    public function __construct($session, $secretKey) {
        $this->session = $session;
        $this->secretKey = $secretKey;
    }

    public function generateToken() {
        if (!isset($this->session['csrf_token'])) {
            $this->session['csrf_token'] = $this->generateSecureToken();
            $_SESSION['csrf_token'] = $this->session['csrf_token'] ;
        }

        return $this->session['csrf_token'];
    }

    public function getToken() {
        return $this->session['csrf_token'] ?? null;
    }

    public function validateToken($submittedToken) {
        if (!isset( $this->session['csrf_token'])) {
            return false;
        }

        $storedToken =  $_SESSION['csrf_token'];
        $submittedHash = hash_hmac('sha256', $submittedToken, $this->secretKey);

        return hash_equals($storedToken, $submittedHash);
    }

    private function generateSecureToken() {
        return bin2hex(random_bytes(32));
    }
    public static function validate($token)
    {
        return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $token;
    }
}