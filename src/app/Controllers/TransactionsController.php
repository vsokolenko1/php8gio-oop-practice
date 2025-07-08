<?php

declare (strict_types=1);

namespace App\Controllers;

use App\Exceptions\File\FileException;
use App\Models\File;
use App\Models\FileCollection;
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

    public function upload(): View {

        return View::make('transactions/upload', [
                    'title' => 'Upload transaction',
                    'formName' => 'Upload your transactions. File must have csv extension.',
        ]);
    }

    public function multiUpload(): View {

        return View::make('/transactions/multiupload', [
                    'title' => 'Multi upload transactions',
                    'formName' => 'Multi upload your transactions. File must have csv extension',
        ]);
    }

    public function store() {

        try {
            
            if(isset($_FILES['files'])) {
                
                $fileCollectionModel = new FileCollection($_FILES['files']);

                $fileCollectionModel->revert();

                foreach ($fileCollectionModel->getFiles() as $file) {

                    $this->_saveDataFromFile($file);

                }
                
            } else {           

                $this->_saveDataFromFile($_FILES['file']);
                
            }

            header('Location: /transactions');
            return;            
            
        } catch (FileException $e) {

            echo $e->getMessage();
            return;
        }        

    }
    
    private function _saveDataFromFile(array $file): void {
        
        $fileModel = new File();

        if ($fileModel->upload($file)) {

            $data = $fileModel->read();

            //Save transactions
            $transactionModel = new Transaction();
            $transactionModel->save($this->user->id, $data);
        }

        $fileModel->remove();        
        
    }
}
