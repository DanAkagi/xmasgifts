<?php

namespace app\controllers;
use app\models\Depot;
use flight\Engine;
use Flight;

class DepotController {

    public function __construct() {
    }

    public function effectuerDepot() {
        $montant = Flight::request()->data->montant;

        Flight::Depot()->effectuerDepot($montant);
    }

    public function getDepotEnAttente(){
        $listeDepots = Flight::Depot()->getDepotEnAttente();
        Flight::render('depotEnAttente', ['listeDepots' => $listeDepots]);
    }

    public function accepterDepot() {
        $id = Flight::request()->data->id;
        $montant = Flight::request()->data->montant;

        Flight::Depot()->accepterDepot($montant);
        $listeDepots = Flight::Depot()->getDepotEnAttente($montant);
        Flight::render('depotEnAttente', ['listeDepots' => $listeDepots]);
    }

}