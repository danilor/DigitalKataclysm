<?php


namespace Kataclysm\Responses;


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

}