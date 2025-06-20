<?php

namespace App;

/**
 * @property-read ?array $db Description
 */
class Config {
    
    protected array $config = [];

    public function __construct(array $env) {
        
        $this->config = [
            'db'    =>  [
                'host'      => $env['DB_HOST'],
                'user'      => $env['DB_USER'],
                'pass'      => $env['DB_PASS'],
                'database'  => $env['DB_NAME'],
                'driver'    => $env['DB_DRIVER'] ?? 'mysql'
            ],            
        ];
    }
    
    public function __get(string $name): mixed {
        return $this->config[$name];
    }
}
