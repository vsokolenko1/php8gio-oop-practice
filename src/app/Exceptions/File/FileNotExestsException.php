<?php

namespace App\Exceptions\File;

class FileNotExestsException extends FileException{

    protected $message = self::FILE_NOT_EXISTS;
    
}
