<?php

use app\controllers\FormulaireController;
use app\controllers\DepotController;
use app\controllers\CadeauController;
use app\controllers\WelcomeController;
use app\controllers\RegisterController;


use flight\Engine;
use flight\net\Router;

$ds = DIRECTORY_SEPARATOR;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$FormulaireController = new FormulaireController();
$DepotController = new DepotController();
$CadeauController = new CadeauController();
$Welcome_Controller = new WelcomeController();
$Register_Controller = new RegisterController();

$router->get('/admin', [$DepotController, 'getDepotEnAttente']);
$router->post('/accept-depot', [$DepotController, 'accepterDepot']);

// Route principale pour l'affichage login et information
$router->get('/', [ $Welcome_Controller, 'showAccueil' ]);
$router->post('/information-form', [$Welcome_Controller, 'informationUser']);

//route pour la page de inscription
$router->get('/register', [$Register_Controller, 'showRegister']);
$router->post('/register-form', [$Register_Controller, 'registerUser']);

//route pour la page de formulaire de information
$router->post('/accueil', [$FormulaireController, 'appliquerInfoFormulaire']);
