<?php

namespace App\Exceptions\File;

class FileNotUploadedException extends FileException{
    
    protected $message = self::FILE_NOT_UPLOADED;
    
}
