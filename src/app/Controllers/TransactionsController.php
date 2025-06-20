<?php

declare (strict_types=1);

namespace App\Controllers;

use App\App;
use App\View;

class TransactionsController {
    
    public function index(): View {

        $db = App::db();
        
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
