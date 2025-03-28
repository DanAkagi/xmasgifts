<?php

namespace app\controllers;
use app\models\Formulaire;
use flight\Engine;
use Flight;

class FormulaireController {

    public function __construct() {
    }

    public function appliquerInfoFormulaire() {
        $nombreFille = Flight::request()->data->nombreFille;
        $nombreGarcon = Flight::request()->data->nombreGarcon;
        $montant = Flight::request()->data->montant;

        $result = Flight::Formulaire()->appliquerInfoFormulaire($nombreFille, $nombreGarcon, $montant);
        Flight::render('accueil', ['cadeaux' => $result]);
    }
}