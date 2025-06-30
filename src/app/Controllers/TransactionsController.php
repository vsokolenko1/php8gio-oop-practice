<?php

declare (strict_types=1);

namespace App\Controllers;

use App\Exceptions\UserNotFoundException;
use App\Models\File;
use App\Models\Transaction;
use App\Models\User;
use App\View;

class TransactionsController {

    private string $userEmail = 'vsokolenko1@gmail.com';
    private object $user;
    
    public function __construct() {
        
        $userModel = new User();
        try {
            
            $this->user = $userModel->findByEmail($this->userEmail);

        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }

    }
    
    public function index(): View {

        $transactionModel = new Transaction();
        $transactions = $transactionModel->load($this->user->id);
        $totals = $transactionModel->getTotals($transactions);

        return View::make('transactions/index', [
                    'title' => 'Transactions Page',
                    'transactions' => $transactions,
                    'totals' => $totals,
        ]);
    }

    public function create(): View {

        return View::make('transactions/create', [
                    'title' => 'Create transaction',
                    'formName' => 'Upload your transactions. File must have csv extension.',
        ]);
    }

    public function store() {

        $fileModel = new File();

        if ($fileModel->upload($_FILES['file'])) {

            $data = $fileModel->read();

            //Save transactions
            $transactionModel = new Transaction();
            $transactionModel->save($this->user->id, $data);
        }

        $fileModel->remove();

        header('Location: /transactions');

        return;
    }
}
