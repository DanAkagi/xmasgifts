<?php
namespace app\controllers;

use Flight;

class WelcomeController {
    public function showAccueil() {
        Flight::render('login');
    }

    public function informationUser() {
        $username = Flight::request()->data->nomuser;
        $password = Flight::request()->data->mdp;

        $user = Flight::loginModel()->getUserByUsername($username);

        if (!$user) {
            Flight::json(['error' => 'Vous n\'êtes pas inscrit.'], 404);
            return;
        }

        // Comparaison directe car les mots de passe sont en texte brut
        if ($password === $user['mdp']) {
            $_SESSION['user_id'] = $user['idUser'];
            $_SESSION['username'] = $user['nomUser'];
            
            Flight::render('information');
        } else {
            Flight::json(['error' => 'Nom d\'utilisateur ou mot de passe incorrect'], 401);
        }
    }
}