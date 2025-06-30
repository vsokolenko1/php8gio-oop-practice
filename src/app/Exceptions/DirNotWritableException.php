<?php

namespace App\Exceptions;

class DirNotWritableException extends FileException{
    
    protected string $message = self::DIR_NOT_WRITABLE;
    
}
