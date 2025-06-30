<?php
use App\Helpers\Helper;
?>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Check #</th>
            <th>Description</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($transactions)): ?>
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= Helper::dateFormat($transaction->date) ?></td>
                    <td><?= $transaction->check ?></td>
                    <td><?= $transaction->description ?></td>
                    <td>
                        <?php if ($transaction->amount < 0): ?>
                            <span style="color: red;">
                                <?=Helper::amountFormat($transaction->amount) //formatDollarAmount($transaction['amount']) ?>
                            </span>
                        <?php elseif ($transaction->amount > 0): ?>
                            <span style="color: green;">
                                <?=Helper::amountFormat($transaction->amount) //formatDollarAmount($transaction['amount']) ?>
                            </span>                                
                        <?php else: ?>
                            <?=Helper::amountFormat($transaction->amount) //formatDollarAmount($transaction['amount']) ?>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total Income:</th>
            <td><?=Helper::amountFormat($totals->totalIncome) ?? 0 ?>    </td>
        </tr>
        <tr>
            <th colspan="3">Total Expense:</th>
            <td><?=Helper::amountFormat($totals->totalExpense) ?? 0 ?></td>
        </tr>
        <tr>
            <th colspan="3">Net Total:</th>
            <td><?=Helper::amountFormat($totals->netTotal) ?? 0 ?></td>
        </tr>
    </tfoot>
</table>