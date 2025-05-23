<?php
require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use PDO;
use Application\Database;
use Application\Model\User;
class SoftwareLicenseManager
{
    private $apiBase = 'https://api.example.com';
    private $apiKey = 'your-api-key'; // Clé d'accès de l'API
    private $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->apiBase,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json'
            ]
        ]);
    }

    public function checkLicense($licenseKey)
    {
        try {
            $response = $this->client->get('/check', [
                'query' => ['key' => $licenseKey]
            ]);
            $data = json_decode($response->getBody(), true);

            return $data;
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => 'Erreur de connexion à l\'API : ' . $e->getMessage()];
        }
    }

    public function validateLicense($licenseKey)
    {
        try {
            $response = $this->client->post('/validate', [
                'form_params' => ['key' => $licenseKey]
            ]);
            $data = json_decode($response->getBody(), true);

            return $data;
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => 'Erreur de connexion à l\'API : ' . $e->getMessage()];
        }
    }

    public function deactivateLicense($licenseKey)
    {
        try {
            $response = $this->client->post('/deactivate', [
                'form_params' => ['key' => $licenseKey]
            ]);
            $data = json_decode($response->getBody(), true);

            return $data;
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => 'Erreur de connexion à l\'API : ' . $e->getMessage()];
        }
    }
    public function getUserData($userId) {
    try {
        $stmt = Database::getInstance()->query(
            "SELECT * FROM users WHERE id = ?",
            [$userId]
        );
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return new User(
                $user['id'],
                $user['username'],
                $user['email'],
                $user['password'],
                $user['role'],
                $user['license_key'],
                $user['theme']
            );
        }
        return null;
    } catch (\Exception $e) {
        return ['status' => 'error', 'message' => 'Erreur lors de la récupération des données utilisateur : ' . $e->getMessage()];
    }
}
}