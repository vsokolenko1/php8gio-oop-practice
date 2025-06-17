<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\TransactionsController;

$route = new App\Route();

$route  ->get('/', [HomeController::class, 'index'])
        ->get('/transactions', [TransactionsController::class, 'index'])
        ->get('/transactions/create', [TransactionsController::class, 'create'])
        ->post('/transactions/create', [TransactionsController::class, 'store']);

echo $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
