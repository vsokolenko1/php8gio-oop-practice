<?php

namespace App\Exceptions\File;

class FileMaxSizeException extends FileException{
    
    protected $message = self::FILE_MAX_SIZE;
    
}
