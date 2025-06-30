<?php
declare(strict_types=1);

namespace App\Helpers;

class Helper {
    
    public static function dateFormat(string $date): string {
        
        $newFormatDate = new \DateTime($date);

        return $newFormatDate->format('M j, Y');
        
    }
    
    public static function amountFormat(float $amount): string {
        
        return ($amount < 0 ? '-' : '') . '$' . abs($amount);
        
    }
    
}
