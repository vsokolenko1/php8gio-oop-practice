<?php

declare (strict_types=1);

namespace App\Models;

use App\Model;

class Transaction extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function load(int $userId): array {
        
        $query = 'SELECT * FROM transaction WHERE userId = ' . $userId;
        
        $stmt = $this->db->query($query);
        
        return $stmt->fetchAll();
        
    }
    
}
