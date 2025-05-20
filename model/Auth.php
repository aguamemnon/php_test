<?php
namespace Application\Model;

class Auth {
    private $session;

    public function __construct($session = null) {
        $this->session = $session ?? $_SESSION;
    }

    public function user() {
        if (isset($this->session['user'])) {
            return (object) $this->session['user'];
        }
        return null;
    }

    public function check() {
        return isset($this->session['user']);
    }

    public function login($userData) {
        $this->session['user'] = $userData;
    }

    public function logout() {
        unset($this->session['user']);
        session_unset();
        session_destroy();
    }
}