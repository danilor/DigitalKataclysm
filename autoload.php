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
global $APP , $REQUEST , $BLADE;
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

