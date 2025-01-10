<?php
namespace app\controllers;

use Flight;

class RegisterController {
    public function showRegister() {
        Flight::render('register');
    }

    public function registerUser() {
        $username = Flight::request()->data->nomuser;
        $password = Flight::request()->data->mdp;
        $password_confirm = Flight::request()->data->mdp_confirm;

        // Vérification si les mots de passe correspondent
        if ($password !== $password_confirm) {
            Flight::json(['error' => 'Les mots de passe ne correspondent pas'], 400);
            return;
        }

        // Vérification si l'utilisateur existe déjà
        if (Flight::registerModel()->userExists($username)) {
            Flight::json(['error' => 'Ce nom d\'utilisateur est déjà pris'], 409);
            return;
        }

        // Création de l'utilisateur
        $result = Flight::registerModel()->createUser($username, $password);
        
        if ($result) {
            Flight::json(['success' => 'Inscription réussie. Vous pouvez maintenant vous connecter.']);
        } else {
            Flight::json(['error' => 'Erreur lors de l\'inscription'], 500);
        }
    }

    public function verifyInformation() {

        $nombreFille = Flight::request()->data->nombreFille;
        $nombreGarcon =Flight::request()->data->nombreGarcon;
        $montant=Flight::request()->data->montant;    
        
        $datacadeau=Flight::verifyInformationModel()->getDataCadeau($nombreFille,$nombreGarcon);
        
        Flight::render('accueil',['datacadeau'=>$datacadeau]);
    }
  
}
