<?php

namespace App\Exceptions\File;

class FileNotSelectedException extends FileException{
    
    protected $message = self::FILE_NOT_SELECTED;
    
}
