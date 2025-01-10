<?php
class Database {
    private static $connexion = null;
    
    public static function getConnexion() {
        if (self::$connexion === null) {
            try {
                self::$connexion = new PDO(
                    'mysql:host=localhost;dbname=taxibe;charset=utf8', 
                    'username', 
                    'password'
                );
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$connexion;
    }
}