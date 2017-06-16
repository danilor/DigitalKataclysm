<?php
/**
 * This is the main console class.
 * It should work similar to artisan commands, but with a different approach on creating new commands.
 *
 * I know this class will take me a while and it would be better to use an existing one, but I want to learn
 * how to do it and also we can make a better class at the end?
 */

namespace Kataclysm\Console;

/**
 * Class Console
 * @package Kataclysm\Console
 */
class Console
{

    const PARAMETER_DIVIDER = '=';
    const PARAMETER_STARTER = '--';

    /**
     * @var array
     */
    private $arguments = [];

    private $namespace_command = '\\Commands\\';

    /**
     * Console constructor.
     */
    public function __construct( $a )
    {
        $this -> arguments = $a;
    }

    /**
     * This will validate the information and return true or false depending on the result
     * @return bool
     */
    public function validate() : bool
    {
        /**
         * The position 1 is the name of the command. Its required
         */
        if( !isset( $this -> arguments[1] ) ){
            return false;
        }
        /**
         * Now that we now that it exists, lets validate it
         */
        $command_name = $this -> arguments[1];
        $class =  $this -> namespace_command . $command_name;
        if( !class_exists( $class ) ){
            return false;
        }
        return true;
    }

    /**
     * This will return the command object itself.
     * Before returning it, we are setting up the parameters
     * @return Command
     */
    public function getCommandClass() : \Kataclysm\Console\Command
    {
        $command_name = $this -> arguments[1];
        $class =  $this -> namespace_command . $command_name;
        $class_object = null;
        eval('$class_object = new '.$class.';');

        $parameters = $this -> arguments;

        $params = []; // This are going to be the parameters we are going to add to the Command object

        /**
         * Lets delete the first and second option because that is the meteor and the command name
         */
        unset( $parameters[0] );
        unset( $parameters[1] );
        /**
         * Now that we clean the parameters, lets divide them into real parameters
         */
        foreach( $parameters AS $key => $parameter ){
            // We are only accepting parameters that follow the structure of -key=value
            $aux = explode( self::PARAMETER_DIVIDER , $parameter );
            if( count($aux) === 2 ){
                // We are only accepting parameters that are in the right format and the split generates two areas
                if( starts_with( $aux[0] , self::PARAMETER_STARTER ) ){
                    // The parameter must start with the symbol --
                    $key        =   trim( str_replace(self::PARAMETER_STARTER , "" , $aux[0] ) );
                    $value      =   trim( $aux[1] );
                    // Now lets add the exact parameter to the values
                    $params[ $key ] =   $value;
                }
            }
        }
        $class_object -> setParameters( $params ); // Now set the parameters
        return $class_object;
    }


    /************************************************/
    /* STATIC AREA                                  */
    /************************************************/

    const MESSAGE_TYPE_SUCCESS      =   'SUCCESS';
    const MESSAGE_TYPE_ERROR        =   'ERROR';
    const MESSAGE_TYPE_INFO         =   'INFO';
    const MESSAGE_TYPE_WARNING      =   'WARNING';
    const MESSAGE_TYPE_ATTENTION    =   'ATTENTION';

    /**
     * General messages. You can pass the message and the type. We have some predefined types, but
     * in the future we can make a function that allows us to send the color by ourselves.
     * But for now, the 5 types we have here are enough.
     * @param $message
     * @param string $type
     * @return string
     * @link https://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/
     */
    public static function general_message( $message , $type = '' ){
        $out = "  ";
        switch($type) {
            case self::MESSAGE_TYPE_SUCCESS:
                $out = "[0;32m"; //Green background
                break;
            case self::MESSAGE_TYPE_ERROR:
                $out = "[41m[1;33"; //Red background
                break;
            case self::MESSAGE_TYPE_WARNING:
                $out = "[1;33m"; //Yellow background
                break;
            case self::MESSAGE_TYPE_INFO:
                $out = "[1;34m"; //Blue background
                break;
            case self::MESSAGE_TYPE_ATTENTION:
                $out = "[0;37m"; //Blue background
                break;
        }
        /**
         * I am not fully sure what is the chr(27) doing. Seems like I will have to trust to somebody else this time.
         */
        return chr(27) . "$out" . $message . chr(27) . "[0m" . PHP_EOL;
    }

    /**
     * This will get the string text and print it.
     * @param $text
     * @param string $type
     */
    public static function print_message( $text , $type = '' ){
        echo self::general_message(  $text , $type );
    }




}