<?php

namespace App;

use PDO;
use PDOException;

/**
 * @mixin PDO
 */
class DB {
    
    private PDO $pdo;
    
    public function __construct(array $config) {
        
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES =>  false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ            
        ];
        
        try {
            $this->pdo = new PDO($config['driver'].':host='.$config['host'].';dbname='.$config['database'],
                $config['user'],
                $config['pass'],
                $config['options'] ?? $defaultOptions
            );
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }
    
    public function __call(string $name, array $arguments): mixed {
        
        return call_user_func_array([$this->pdo, $name], $arguments);
        
    }
    
}
