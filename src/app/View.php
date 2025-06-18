<?php

declare (strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;
use const VIEW_PATH;

class View {
    
    public function __construct(
        protected string $view,
        protected array $params = [],
        protected bool $layout = true
    ) {

    }
    
    public function render(): string {
        
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        
        if(!file_exists($viewPath)) {
            
            throw new ViewNotFoundException();
            
        }
//        var_dump($this->params);
        foreach ($this->params as $key => $value) {
            
            $$key = $value;
            
        }
        
        ob_start();

        include $viewPath;
            
        $viewTemplate = (string) ob_get_clean();        
        
        if($this->layout) {
            
            $layoutPath = VIEW_PATH . '/layout.php';
            
            if(!file_exists($layoutPath)) {
                
                throw new ViewNotFoundException();
                
            }
            
            ob_start();
            
            include $layoutPath;
            
            $layoutTemplate = ob_get_clean();
            
            $template = str_replace('{{content}}', $viewTemplate, $layoutTemplate);
            
        }
     
        return $template ?? $viewTemplate;
    }
    
    public static function make(string $view, array $params=[], bool $layout = true): View {
        
        return new static($view, $params, $layout);
        
    }
    
    public function __toString(): string {
        
        return $this->render();
        
    }
    
    public function __get(string $name): mixed {
        return $this->params[$name];
    }
    
}
