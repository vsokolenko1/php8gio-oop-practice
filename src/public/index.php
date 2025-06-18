<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\TransactionsController;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('VIEW_PATH', __DIR__ . '/../app/views');

try {
    
$route = new App\Route();

$route  ->get('/', [HomeController::class, 'index'])
        ->get('/transactions', [TransactionsController::class, 'index'])
        ->get('/transactions/create', [TransactionsController::class, 'create'])
        ->get('/transactions/upload', [TransactionsController::class, 'upload'])
        ->post('/transactions/create', [TransactionsController::class, 'store']);

echo $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

} catch (\App\Exceptions\RouteNotFoundException $e) {
    
    http_response_code(404);//  same -  header('HTTP/1.1 404 Not Found');
    
    echo App\View::make('error/404', [], false);
    
}