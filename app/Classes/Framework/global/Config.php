<?php

use Kataclysm\Kataclysm;
use Kataclysm\System\SystemException;

/**
 * Class Config
 * We don't have namespace for this one because we want this to be available to be called without any namespace here
 * Maybe this is not the best way to manage the config file, but for now it's ok. This does not mean that it will remain this way, it can be improve it in the future.
 * TODO: Find a way to improve the Configuration Class
 */
class Config
{

    /**
     * Constants for the Config File
     */
    const SEPARATOR = '.';
    const EXTENSION = 'php';
    const INI_FILE = 'app.ini';

    private static $ini = null;

    /**
     * This method will return the
     * @param string $key
     * @param string $default
     * @return MIXED We are not indicating what we are actually returning because it can be an string or an array or maybe an object
     * @throws \Kataclysm\System\SystemException
     * @see \Kataclysm\System\SystemException
     */
    public static function get(string $key , $default = "" )
    {
            /**
             |-------------------------------------------------------------------------------------
             | If the key is null then return the default (it should not happen this case)
             |-------------------------------------------------------------------------------------
             */
            if( $key == null ){
                return $default;
            }

            /**
             |-------------------------------------------------------------------------------------
             | Lets separate the sections.
             | Indicating the 2 at the end, will only return the first section of the string as the first element, and the rest is going to be returned as string
             |-------------------------------------------------------------------------------------
             */
            $sections = explode( self::SEPARATOR ,$key , 2 );
            $config_file = self::getConfigFilePath( $sections[0] );

            // If it is only 1 section, that means we are returning the full Configuration file
            if( count($sections) == 1 ){
                if( !\File::exist( $config_file ) ){
                    //throw new SystemException("Config File does not exist");
                    /**
                    |-------------------------------------------------------------------------------------
                    | Originally, we were throwing a system exception error, but I guess its better
                    | just to return the default value and continue with the execution of the app
                    |-------------------------------------------------------------------------------------
                     */
                }
                return include( $config_file );
            }else{
                // Then it means that we are returning one specific element
                $config = include( $config_file );
                /**
                |-------------------------------------------------------------------------------------
                | Now that we got the information from the config file (and store it in the $config variable,
                | we can now start going deeper into the configuration information we just have (without reading the config file again).
                |-------------------------------------------------------------------------------------
                 */
                return self::read_config_element( $config , $sections[1] , $default );
            }
    }


    /**
     * It will return the value of one configuration in the INI file.
     * These configurations are perfect when they are environment related.
     * @param string $key
     * @param string $default
     * @return string
     */
    public static function env(string $key , $default = '' ) : string
    {
        if( self::$ini == null ){
            self::$ini      =       parse_ini_file( self::getEnvFilePath() );
        }

        if( !isset( self::$ini[ $key ] ) ){
            return $default;
        }
        return self::$ini[ $key ];
    }

    /**
     * Recursive METHOD
     * @param $config
     * @param string $key This should be the remaining key
     * @param MIXED We are not indicating what we are actually returning because it can be an string or an array or maybe an object
     * @return string|mixed
     */
    private static function read_config_element($config , string $key , string $default){
        /**
        |-------------------------------------------------------------------------------------
        | Lets separate the sections.
        | Indicating the 2 at the end, will only return the first section of the string as the first element, and the rest is going to be returned as string
        |-------------------------------------------------------------------------------------
         */
        $sections = explode( self::SEPARATOR ,$key , 2 );

        /**
        |-------------------------------------------------------------------------------------
        | If the next key to check does not exist, we return the dafault value
        |-------------------------------------------------------------------------------------
         */
        if( !isset( $config[ $sections[0] ] ) ){
            return $default;
        }
        /**
        |-------------------------------------------------------------------------------------
        | If this only one, then we just reach the information we want to use
        |-------------------------------------------------------------------------------------
         */
        if( count($sections) == 1 ){
            return $config[ $sections[0] ];
        }else{
            /**
            |-------------------------------------------------------------------------------------
            | Else, we have to go even deeper.
            |-------------------------------------------------------------------------------------
             */
            $config = $config[ $sections[0] ];
            return self::read_config_element( $config , $sections[1] , $default );
        }
    }

    /**
     * Returns the path of the config file name
     * @param string $configName
     * @return string
     */
    private static function getConfigFilePath( string $configName ) : string
    {
        /**
        |-------------------------------------------------------------------------------------
        | Get the Config  path from the APP instance
        |-------------------------------------------------------------------------------------
         */
        $config_folder = Kataclysm::getInstance()->getConfigPath();
        return $config_folder . DIRECTORY_SEPARATOR . $configName . self::SEPARATOR . self::EXTENSION; // We are using position 0 because that is suppose to be the filename
    }

    /**
     * It returns the path of the ini file defined with the constants in this Config
     * @return string
     */
    private static function getEnvFilePath() : string{
        return Kataclysm::getInstance()->getAppBasePath() . DIRECTORY_SEPARATOR . self::INI_FILE;
    }

}