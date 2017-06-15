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

/**
    |------------------------------------------------------|
    | Wild Cards                                           |
    |------------------------------------------------------|
    | {area_name:}              =>      Required           |
    | {area_name?}              =>      Optional           |
    |------------------------------------------------------|
*/

// Create the Route using the usual method
$Route = new Route();
// Set up the parameters
$Route -> setUrl( "/" );
$Route -> setMethod( Request::METHOD_GET  );
$Route -> setClassName( "Welcome" );
$Route -> setMethodName( "start" );
// Add the route to the routes list
Routes::addRoute( $Route );

// Now lets create a rute using the simplified method
create_route( Request::METHOD_GET           ,           "/mygithub"         ,       "Welcome"           ,       "showMyGithub" );

create_route( Request::METHOD_GET           ,           "/yvideo/{id:}/"     ,       "Welcome"           ,       "showYoutubeVideo" );

create_route( Request::METHOD_GET           ,           "/database_example/" ,       "Welcome"           ,       "showDatabase" );


