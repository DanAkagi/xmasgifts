<?php
namespace app\models;

use PDO;

class RegisterModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function userExists($username) {
        $sql = "SELECT COUNT(*) FROM user WHERE nomUser = :nomuser";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':nomuser' => $username]);
        return $stmt->fetchColumn() > 0;
    }

    public function createUser($username, $password) {
        try {
            $sql = "INSERT INTO user (nomUser, mdp) VALUES (:nomuser, :mdp)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':nomuser' => $username,
                ':mdp' => $password  
            ]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getDataCadeau($nombreFille, $nombreGarcon) {
        // Calcul de la moyenne neutre
        $moyenne_neutre = (int)(($nombreGarcon + $nombreFille) / 2);
    
        // Assurer que les valeurs sont des entiers
        $nombreFille = (int)$nombreFille;
        $nombreGarcon = (int)$nombreGarcon;
        $moyenne_neutre = (int)$moyenne_neutre;
    
        // Construire la requête SQL en échappant manuellement les valeurs
        $sql = "
            SELECT * FROM (
            (SELECT *      
            FROM cadeau     
            WHERE categorieCadeau = 'fille'     
            ORDER BY RAND()     
            LIMIT {$nombreFille}) 
            UNION ALL 
            (SELECT *      
            FROM cadeau     
            WHERE categorieCadeau = 'garcon'     
            ORDER BY RAND()     
            LIMIT {$nombreGarcon}) 
            UNION ALL 
            (SELECT *      
            FROM cadeau     
            WHERE categorieCadeau = 'neutre'     
            ORDER BY RAND()     
            LIMIT {$moyenne_neutre})
            ) AS subquery
            ORDER BY RAND();
            ";
    
        // Exécuter la requête
        try {
            $result = $this->db->query($sql);
    
            // Vérifier si la requête a bien été exécutée
            if ($result === false) {
                throw new \Exception("Erreur lors de l'exécution de la requête SQL.");
            }
    
            // Retourner les résultats
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Gestion des erreurs
            throw new \Exception('Erreur dans getDataCadeau : ' . $e->getMessage());
        }
    }
}    