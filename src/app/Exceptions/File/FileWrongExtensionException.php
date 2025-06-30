<?php

namespace App\Exceptions\File;

class FileWrongExtensionException extends FileException{
    
    protected $message = self::FILE_WRONG_EXTENSION;
    
}
