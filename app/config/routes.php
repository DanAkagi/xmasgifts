<?php

use app\controllers\FormulaireController;
use app\controllers\DepotController;
use app\controllers\CadeauController;

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

$router->get('/', [$DepotController, 'getDepotEnAttente']);
$router->post('/accept-depot', [$DepotController, 'accepterDepot']);