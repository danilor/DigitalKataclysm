<?php
/*
|--------------------------------------------------------------------------
| Error showing
|--------------------------------------------------------------------------
|
| If you want the errors to be hidden, please comment the following two lines
*/
error_reporting(E_ALL);
ini_set('display_errors', 'On');

/*
|--------------------------------------------------------------------------
| Error handler
|--------------------------------------------------------------------------
|
| We set up the error handlers to be used in case of fatal errors.
*/

set_error_handler('error_handler');
register_shutdown_function('fatalErrorShutdownHandler');
/*
|--------------------------------------------------------------------------
| This method will handle the fatal error.
|--------------------------------------------------------------------------
|
| This should be the less "framework"less we can because since there is an error, we have to manage everything manually.
*/
function error_handler($code, $message, $file, $line)
{
    /**
     * Lets get the blade instance
     */
    $path = __DIR__  . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR .'Views' . DIRECTORY_SEPARATOR . 'errors' . DIRECTORY_SEPARATOR . 'fatalerror.blade.php';
    $content = file_get_contents( $path );
    $full_message = $message . ' ' . $file . ' ' . $line;
    $content = str_replace("[MESSAGE]" , $full_message , $content);
    echo $content;
    die();
}
/*
|--------------------------------------------------------------------------
| This method will help to handle the fatal error
|--------------------------------------------------------------------------
|
| This method will help to handle the fatal error
*/
function fatalErrorShutdownHandler(){
    $last_error = error_get_last();
    if ($last_error['type'] === E_ERROR) {
        /**
         * A fatal error just happened
         */
        myErrorHandler(E_ERROR, $last_error['message'], $last_error['file'], $last_error['line']);
    }
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Lets include the autoloader we need
*/
require __DIR__ . '/vendor/autoload.php';
/*
|--------------------------------------------------------------------------
| Global Variables
|--------------------------------------------------------------------------
|
| We are using the global variables just in case. It should not impact that much on the app performance
*/
global $APP , $REQUEST , $BLADE , $DB;
/*
|--------------------------------------------------------------------------
| APP is the main application instance
|--------------------------------------------------------------------------
|
| When constructing, we are passing the __DIR__ magic variable to override the usual dir space inside all the APP.
*/
$APP = \Kataclysm\Kataclysm::getInstance( __DIR__ );
/*
|--------------------------------------------------------------------------
| Request | Blade Global Variables
|--------------------------------------------------------------------------
|
| We are obtaining the instances of the REQUESTS and BLADE Variables
*/
$REQUEST        =       $APP    ->  getRequest();
// Now lets set up the blade system
$BLADE          =       $APP    ->  getBlade();