<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Charger les variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use Vendor\Challenge2\controller\CommandeController;
use Vendor\Challenge2\controller\SecurityController;
use Vendor\Challenge3\core\Route;
use Vendor\Challenge3\core\SessionManager;

// Démarrer la session
SessionManager::start();

require_once '../route/route.web.php';

Route::resolve($TabUri);