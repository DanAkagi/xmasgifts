<?php

namespace app\models;
use flight\Engine;
use Flight;

session_start();

class Cadeau {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Bénéfice total par véhicule
    public function chercherCadeau($nombreFille, $nombreGarcon) {

        $cadeaux = array(array()); 
        $query = "SELECT * FROM cadeau WHERE categorieCadeau = ? :cat OR categorieCadeau = :neutre";

        if($nombreGarcon == 0 && $nombreFille == 0){
            return $message = 'Il faut au moins un enfant pour avoir des cadeaux.';
        }

        if($nombreGarcon > 0) {
            $cat = 'garcon';
            $stmt = $this->db->prepare($query);
            $stmt->execute(['cat' => $cat , 'neutre' => 'neutre']);
            $cadeaux[$cat] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        if($nombreFille > 0){
            $cat = 'fille';
            $stmt = $this->db->prepare($query);
            $stmt->execute(['cat' => $cat , 'neutre' => 'neutre']);
            $cadeaux[$cat] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $cadeaux;

    }

    public function checkSolde($idUser, $cadeaux){
        $sumPrix = 0;
        $query = "SELECT prix FROM cadeau WHERE idCadeau = ? :idCadeau";
        foreach($cadeaux as $cad){
            $stmt = $this->db->prepare($query);
            $stmt->execute(['idCadeau' => $cad['idCadeau']]);
            $sumPrix += $stmt['prix'];
        }

        $query = "SELECT depot FROM user WHERE idUser = :idUser";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['idUser' => $idUser]);
        $solde = $stmt['depot'];

        if(sumPrix > $solde){
            return $error_message = "Le solde est insuffisant.";
        }
    }

    public function acheterCadeaux ($idUser, $cadeaux){
        $sumPrix = 0;
        $query = "SELECT prix FROM cadeau WHERE idCadeau = ? :idCadeau";
        foreach($cadeaux as $cad){
            $stmt = $this->db->prepare($query);
            $stmt->execute(['idCadeau' => $cad['idCadeau']]);
            $sumPrix += $stmt['prix'];
        }

        $query = "UPDATE user SET depot = (depot - :sum) WHERE idUser = :idUser";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['idUser' => $idUser, 'sum' => $sumPrix]);
        $_SESSION['panier'] = [];

    }

    
    public function ajouterPanier($idUser, $cadeau){
        array_push($_SESSION['panier'], $cadeau);
    }



}