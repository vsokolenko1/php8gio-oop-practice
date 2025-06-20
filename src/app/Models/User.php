<?php

declare (strict_types=1);

namespace App\Models;

use App\Model;

class User extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function findByEmail(string $email): \stdClass {
        
        $query = 'SELECT * FROM user WHERE email LIKE ?';
        
        $stmt = $this->db->prepare($query);
        
        $stmt->execute(["%$email%"]);
        
        return $stmt->fetch();
        
    }
    
}
