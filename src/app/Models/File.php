<?php

declare (strict_types=1);

namespace App\Models;

use App\Exceptions\DirNotWritableException;
use App\Exceptions\File\FileMaxSizeException;
use App\Exceptions\File\FileNotMovedException;
use App\Exceptions\File\FileNotRemovedException;
use App\Exceptions\File\FileNotUploadedException;
use App\Exceptions\File\FileWrongExtensionException;
use const STORAGE_PATH;

class File {
    
    // 2Mb
    private const FILE_MAX_SIZE = 2097152;
    private const FILE_EXTENSION = 'text/csv';
    private string $path;

    public function __construct() {
         
    }
    
    public function upload(array $file): bool{
        
        $this->path = STORAGE_PATH . '/' . $file['name'];

        if(!is_uploaded_file($file['tmp_name'])){
            
            throw new FileNotUploadedException();
            
        }
        
        if($file['type'] !== self::FILE_EXTENSION){
            
            throw new FileWrongExtensionException();
            
        }
        
        if(!is_writeable(STORAGE_PATH)){
            
            throw new DirNotWritableException();
            
        } 
        
        if($file['size'] >= self::FILE_MAX_SIZE) {
            
            throw new FileMaxSizeException();
            
        }
        
        if(!move_uploaded_file($file['tmp_name'] , $this->path)) {
            
            throw new FileNotMovedException();
            
        }
        
        return true;
        
    }
    
    public function read(): array {
        
        if(!file_exists($this->path)) {
            
            throw new FileNotExistsException();
            
        }
        
        if($fh = fopen($this->path, 'r')) {
            
            fgetcsv($fh, escape: '');
            
            $data = [];
            
            while(($transaction = fgetcsv($fh, escape: '')) !== false){
                
                //todo closure function as in procedural extract data, by default & by parameter
                
                $data[] = $transaction;
                
            }
            
        }
        
        return $data;
        
    }
    
    public function remove(): string {
        
        if(!unlink($this->path)){
            
            throw new FileNotRemovedException();
            
        } else {
            
            return 'File removed successfully ' . $this->path;
            
        }        
        
    }
    
}
