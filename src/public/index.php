<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\App;
use App\Config;
use App\Controllers\HomeController;
use App\Controllers\TransactionsController;
use App\Route;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('VIEW_PATH', __DIR__ . '/../app/views');
define('STORAGE_PATH', __DIR__ . '/../storage');

$route = new Route();

$route  ->get('/', [HomeController::class, 'index'])
        ->get('/transactions', [TransactionsController::class, 'index'])
        ->get('/transactions/create', [TransactionsController::class, 'create'])
        ->get('/transactions/uploadmulti', [TransactionsController::class, 'uploadMulti'])
        ->post('/transactions/create', [TransactionsController::class, 'store'])
        ->post('/transactions/uploadmulti', [TransactionsController::class, 'storeMulti']);

(new App($route, ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']], 
        new Config($_ENV)
))->run();
