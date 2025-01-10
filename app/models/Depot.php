<?php

namespace app\models;
use flight\Engine;
use Flight;

class Depot {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Bénéfice total par véhicule
    public function effectuerDepot($id, $montant) {
        $query = "INSERT INTO depot (idUser, montant) VALUES ( :id, :montant)";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id, 'montant' => $montant]);
    }

    public function getDepotEnAttente(){
        $query = "SELECT idUser, montant FROM
                (SELECT idUser, SUM(montant) as montant FROM depot GROUP BY idUser) as depot
                    ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function accepterDepot($id, $montant) {
        //Confirmer que l'utilisateur a fait un dépôt
        $query = "UPDATE user SET depot = (depot + :montant) WHERE idUser = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id, 'montant' => $montant]);

        //Supprime le dépôt de la liste d'attente
        $query = "DELETE FROM depot WHERE idUser = :id AND montant = :montant";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id, 'montant' => $montant]);
    }



}