<?php


namespace Kataclysm\Responses;
use Kataclysm\System\SystemException;


/**
 * Class Response
 * This class will work as a type of response for the calls of the controllers.
 * its abtract because it should not be able to create an instance of this class
 * @package Kataclysm\Responses
 */
abstract class Response
{

    /**
     * All responses should return a full string of what
     * they want to print into the page.
     * @return string
     */
    public abstract function execute() : string;


    /**
     * This method will process a full response and return the string of its result
     * @param Response $response
     * @return string
     * @throws SystemException
     */
    public static function processResponse( Response $response) : string
    {
        /**
         * We work with the response view now
         */
        if( $response instanceof ResponseView ){
            return $response->execute();
        }else{
            /**
             * If it is not in the response lists we accept, then we throw an error
             */
            throw new SystemException("Response invalid. It is not one of the valid responses accepted by the system.");
        }
    }

}