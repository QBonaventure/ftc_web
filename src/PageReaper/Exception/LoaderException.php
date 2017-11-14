<?php
namespace FTC\PageReaper\Exception;

class LoaderException extends \Exception
{
    
    const FILE_NOT_FOUND = 'File %s not found';
    

    public static function fileNotFound($filename)
    {
        throw new LoaderException(sprintf(self::FILE_NOT_FOUND, $filename));
    }
    
}
