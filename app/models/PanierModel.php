<?php
namespace app\models;

class PanierModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserByUsername($username) {
        try {
            $sql = "SELECT * FROM user WHERE nomUser = :nomuser";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':nomuser' => $username]);
            
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // Log l'erreur si nécessaire
            return false;
        }
    }
}