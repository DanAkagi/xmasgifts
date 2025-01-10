<?php

namespace app\models;
use app\models\Cadeau;
use app\models\Depot;
use flight\Engine;
use Flight;

class Formulaire {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Bénéfice total par véhicule
    public function appliquerInfoFormulaire($nombreFille, $nombreGarçon, $montant) {
        $cadeaux = Flight::Cadeau()->chercherCadeau($nombreFille, $nombreGarçon);
        Flight::Depot()->effectuerDepot($montant);
        return $cadeaux;

    }



}