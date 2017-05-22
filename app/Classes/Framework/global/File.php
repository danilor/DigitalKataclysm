<?php

/**
 * Class Util
 * The Files class. It does not have namespace because we want to use it everywhere.
 */
class File
{

    /**
     * Returns true if a file exist
     * @param string $path
     * @return bool
     */
    public static function exist( string $path ) : bool
    {
        if (file_exists( $path )) {
            if( is_dir( $path ) ){
                // Since we are validating the file only, if this is a dir, lets return false
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
}