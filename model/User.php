<?php
namespace Application\Model;

class User  {
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;
    private $license_key;

    public function __construct($id, $username, $email, $password, $role, $license_key) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->license_key = $license_key;
        $this->theme = $theme;
    }

     // Getter pour ID
    public function getId() {
        return $this->id;
    }

    // Getter pour Username
    public function getUsername() {
        return $this->username;
    }

    // Getter pour Email
    public function getEmail() {
        return $this->email;
    }

    // Getter pour Role
    public function getRole() {
        return $this->role;
    }

    // Getter pour License Key
    public function getLicenseKey() {
        return $this->license_key;
    }

    // Getter pour Statut de la License
    public function getLicenseStatus() {
        return $this->license_status;
    }
    public function getTheme() {
        return $this->theme; }
    // Getters et setters
     public function checkLicense()
    {
        $licenseManager = new SoftwareLicenseManager();
        $licenseStatus = $licenseManager->checkLicense($this->license_key);
        
        if ($licenseStatus['status'] === 'success') {
            // 0 = OK, 1 = Expired, 2 = Invalid
            $this->license_class = $licenseStatus['data']['status_code'];
            return true;
        } else {
            return false;
        }
    }
}
