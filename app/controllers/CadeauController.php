<?php

namespace app\controllers;
use app\models\Cadeau;
use flight\Engine;
use Flight;


class CadeauController {

    public function __construct() {
    }

    public function chercherCadeau() {
        $nombreFille = Flight::request()->data->$nombreFille;
        $nombreGarcon = Flight::request()->data->$nombreGarcon;

        $result = Flight::Cadeau()->chercherCadeau($nombreFille, $nombreGarcon);
        Flight::render('genererCadeau', ['listeCadeaux' => $result]);
    }

    public function acheterCadeaux(){
        $cadeaux = $_SESSION['panier'];

        $checkSolde = Flight::Cadeau()->checkSolde($cadeaux);

        if(!empty($checkSolde)){            
            Flight::render('recevoirCadeau', ['error_message' => $checkSolde]);
        } else {
            Flight::Cadeau()->acheterCadeaux($cadeaux);
            Flight::render('recevoirCadeau', ['listeCadeaux' => $cadeaux]);
        }
    }

    public function ajouterPanier($idCadeaux){
        Flight::Cadeau()->ajouterPanier($idCadeaux);
        Flight::render('recevoirCadeau', ['listeCadeaux' => $cadeaux]);
    }
}