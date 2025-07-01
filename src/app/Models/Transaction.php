<?php

declare (strict_types=1);

namespace App\Models;

use App\Model;

class Transaction extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function load(int $userId): array {

        $query = 'SELECT * FROM transaction WHERE userId = ' . $userId;

        $stmt = $this->db->query($query);

        return $stmt->fetchAll();
    }

    private function saveOne(array $transaction): int {

        $stmt = $this->db->prepare('INSERT INTO transaction (`userId`, `amount`, `check`, `description`, `date`) '
                . 'VALUES(:userId, :amount, :check, :description, :date)');
        $stmt->execute($transaction);

        return (int) $this->db->lastInsertId();
    }

    public function save(int $userId, array $transactions): void {

        try {

            $this->db->beginTransaction();

            foreach ($transactions as $transaction) {
                
                //if we have empty date in row in the transaction file
                if(empty($transaction['0'])) continue;
                
                $transaction = [
                    'userId' => $userId,
                    'amount' => str_replace(['$', ','], '', $transaction[3]),
                    'check' => (int) $transaction[1],
                    'description' => $transaction[2],
                    'date' => date('Y-m-d', strtotime($transaction[0])),
                ];

                $this->saveOne($transaction);
            }

            $this->db->commit();
        } catch (\Throwable $e) {

            if ($this->db->inTransaction()) {

                $this->db->rollBack();
            }

            throw $e;
        }
    }

    public function getTotals(array $transactions): \stdClass {

        $totals = new \stdClass();

        $totals->netTotal = $totals->totalExpense = $totals->totalIncome = 0;

        foreach ($transactions as $transaction) {

            $totals->netTotal += $transaction->amount;

            if ($transaction->amount < 0) {

                $totals->totalExpense += $transaction->amount;
            } else {

                $totals->totalIncome += $transaction->amount;
            }
        }

        return $totals;
    }
}
