<?php

use flight\Engine;
use flight\database\PdoWrapper;
use flight\debug\database\PdoQueryCapture;
use Tracy\Debugger;

use app\models\Formulaire;
use app\models\Cadeau;
use app\models\Depot;


/** 
 * @var array $config This comes from the returned array at the bottom of the config.php file
 * @var Engine $app
 */

// uncomment the following line for MySQL
 $dsn = 'mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['dbname'] . ';charset=utf8mb4';

// uncomment the following line for SQLite
// $dsn = 'sqlite:' . $config['database']['file_path'];

// Got google oauth stuff? You could register that here
// $app->register('google_oauth', Google_Client::class, [ $config['google_oauth'] ]);

// Redis? This is where you'd set that up
// $app->register('redis', Redis::class, [ $config['redis']['host'], $config['redis']['port'] ]);

// Uncomment the below lines if you want to add a Flight::db() service
$pdoClass = Debugger::$showBar === true ? PdoQueryCapture::class : PdoWrapper::class; 
$app->register('db', $pdoClass, [ $dsn, $config['database']['user'] ?? null, $config['database']['password'] ?? null]);

//Ajout de mapping
Flight::map('Depot', function(){
    return new Depot(Flight::db());
});

Flight::map('Formulaire', function(){
    return new Formulaire(Flight::db());
});

Flight::map('Cadeau', function(){
    return new Cadeau(Flight::db());
});
