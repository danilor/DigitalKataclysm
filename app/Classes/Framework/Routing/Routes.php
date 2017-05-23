<?php


namespace Kataclysm\Routing;


/**
 * Class Routes
 * This will hold the list of routes for the site
 * @package Kataclysm\Routing
 */
class Routes
{
    /**
     * This is because I want to have the separator in a const, just for the case in the future we change it
     */
    const IDENTIFIER_SEPARATOR =  '|';

    /**
     * This will hold the routes for the site.
     * @var array
     */
    private static $routes = [];


    /**
     * This method will add a route and return the list of available routes.
     * It allows override routes.
     * @param Route $route
     * @return array
     */
    public static function addRoute(Route $route ) : array
    {
        /**
         * We have to generate the unique key for this route so in the future we can found it easily
         */
        $identifier =  $route->getMethod() . self::IDENTIFIER_SEPARATOR .  $route -> getUrl();
        self::$routes[ $identifier ]        =       $route;
        /**
         * Now we return the new list.
         */
        return self::$routes;
    }

    /**
     * This method will return the full list of routes
     * @return array
     */
    public static function getRoutes() : array
    {
        return self::$routes;
    }

}