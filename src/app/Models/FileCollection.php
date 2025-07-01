<?php
declare (strict_types=1);

namespace App\Models;

use App\Exceptions\File\FileNotSelectedException;

class FileCollection {
    
    public function __construct(protected array $files) {
        
    }
    
    public function revert(): int {
        
        if(!file_exists($this->files['tmp_name'][0])) {
            
            throw new FileNotSelectedException();
            
        }
        
        $size = count($this->files['name']);        
        
        $files = [];
        
        for ($i = 0; $i < $size; $i++){
            
            foreach ($this->files as $key => $value) {
                
                $files[$i][$key] = $value[$i];
                
            }
            
        }
        
        $this->files = $files;

        return count($this->files);
        
    }
    
    public function getFiles(): array {
        
        return $this->files;
        
    }
    
}
