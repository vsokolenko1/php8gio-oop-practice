<?php

declare (strict_types=1);

namespace App\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\View;

class TransactionsController {
    
    public function index(): View {        
        
        $email = 'vsokolenko1@gmail.com';
        
        $userModel = new User();
        $user = $userModel->findByEmail($email);        
        
        $transactionModel = new Transaction();
        $transactions = $transactionModel->load($user->id);
        
        return View::make('transactions/index', [
            'title'    =>  'Transactions Page',
            'transactions'  =>  $transactions
        ]);
        
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
