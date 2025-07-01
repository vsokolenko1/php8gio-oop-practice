<?php

namespace App\Exceptions;

class DirNotWritableException extends FileException{
    
    protected $message = self::DIR_NOT_WRITABLE;
    
}
