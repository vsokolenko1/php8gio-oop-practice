<?php

namespace App\Exceptions\File;

abstract class FileException extends \Exception {
    
    protected const FILE_NOT_UPLOADED   = 'This file not uploaded';
    protected const DIR_NOT_WRITABLE    = 'Permission the directory is denied.';
    protected const FILE_NOT_MOVED      = 'The file was not moved.';
    protected const FILE_NOT_REMOVED    = 'File not removed.';
    protected const FILE_MAX_SIZE       = 'File max size is 2Mb.';
    protected const FILE_WRONG_EXTENSION= 'File wrong extension.';
    protected const FILE_NOT_EXISTS     = 'File not exists';
    
}
