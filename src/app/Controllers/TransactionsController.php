<?php

declare (strict_types=1);

namespace App\Controllers;

use App\View;

class TransactionsController {
    
    public function index(): View {

        try {
        $db = new \PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS'], [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
        ]);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
        
        return View::make('transactions/index', ['title'    =>  'Transactions Page']);
        
    }
    
    public function create(): View {

        return View::make('transactions/create', ['title'    =>  'Create transaction']);
        
    }
    
    public function store() {
        
        //todo check data from post amount
        $amount = $_POST['amount'];
        return $amount;
        
    }
    
    public function upload() {
        
        header('Location: /');
        exit();
    }
    
}
