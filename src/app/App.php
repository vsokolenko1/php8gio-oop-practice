<?php

declare (strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class App {
    
    private static DB $db;
    
    public function __construct(protected Route $route, protected array $request, protected Config $config) {
        
        self::$db = new DB($config->db ?? []);
        
    }
    
    public function run() {
        
        try {
            
            echo $this->route->resolve(
                    $this->request['uri'],
                    strtolower($this->request['method'])
            );

        } catch (RouteNotFoundException) {

            http_response_code(404);//  same -  header('HTTP/1.1 404 Not Found');

            echo View::make('error/404', [], false);

        }        
        
        
    }
    
    public static function db(): DB {
        
        return self::$db;
        
    }
    
}
