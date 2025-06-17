<?php

declare (strict_types=1);

namespace App\Controllers;

class TransactionsController {
    
    public function index(): string {
        
        return 'Transaction class & index method';
        
    }
    
    public function create(): string {

        return '<form action="/transaction/create" method ="post">'
        . '<input type="text" name="amount" />'
                . '</form>';
        
    }
    
    public function store() {
        
        return $amount = $_POST['amount'];
        
    }
    
}
