<?php
/**
 * The Routes file  will hold all routes for the application.
 * This is the main file the developer should modify.
 *
 * We are including the use of the Route and Routes classes to make easier to
 * interact with the routes file
 */


use Kataclysm\Routing\Route;
use Kataclysm\Routing\Routes;
use Kataclysm\Data\Request;

/**
 * MAIN ROUTES
 */

// Create the Route
$Route = new Route();
// Set up the parameters
$Route -> setUrl( "/" );
$Route -> setMethod( Request::METHOD_GET  );
$Route -> setClassName( "Welcome" );
$Route -> setMethodName( "start" );
// Add the route to the routes list
Routes::addRoute( $Route );