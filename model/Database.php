<?php
namespace Application;
use PDO;
class Database {
    private static $instance = null;
    private $db;

    private function __construct() {
        $this->db = new PDO(
            'mysql:host=localhost;dbname=projet',
            'root',
            'mailserv'
        );
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($query, $params = []) {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}