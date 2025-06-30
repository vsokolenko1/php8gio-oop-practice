<?php

namespace App\Exceptions\File;

class FileNotUploadedException extends FileException{
    
    protected string $message = self::FILE_NOT_UPLOADED;
    
}
