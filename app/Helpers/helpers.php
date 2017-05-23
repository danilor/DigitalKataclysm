<?php
/**
 * This file will contain a series of global functions to simplify the way they are called in the system.
 * So instead of calling for example static classes for one single function, we will just call a function
 */

/**
 * Equivalent to the Config::env method
 * @param string $key
 * @param string $default
 * @return string
 * @see \Config
 */
function env( string $key , string $default = '' ) : string{
    return \Config::env( $key , $default );
}

/**
 * Method to return the value of a config indicated by the KEY.
 * It does not have strict type of return since we don't exactly know
 * what is going to be returned (its user defined)
 * @param string $key
 * @param string $default
 * @return mixed
 */
function config( string $key , string $default = '' ){
    return \Config::get( $key , $default );
}

/**
 * This method will return the value of the segment indicated. It accepts a default value.
 * @param int $i
 * @param string $default
 * @return string
 */
function segment( int $i , string $default = '' ) : string{
    return \Kataclysm\Kataclysm::getInstance()->getRequest()->getSegment( $i , $default );
}