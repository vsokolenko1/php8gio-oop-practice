<?php

namespace App\Exceptions\File;

/**
 * Description of FileNotMovedException
 *
 * @author vladyslav
 */
class FileNotMovedException extends FileException{
    
    protected string $message = self::FILE_NOT_MOVED;
    
}
