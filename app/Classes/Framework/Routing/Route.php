<?php

namespace Kataclysm\Routing;

/**
 * Class Route
 * This class will represent a route element
 * @package Kataclysm\Routing
 */
class Route
{

    /**
     * The following constants were made to analize the URLs for required and optional parameters
     */
    const PREG_REQUIRED = '/\{[^\:]*:\}/';
    const PREG_OPTIONAL = '/\{[^\:]*\?\}/';
    const PREG_REPLACE_REQUIRED = '[^\/]+';
    const PREG_REPLACE_OPTIONAL = '[^\/]*';

    /**
     * @var string
     */
    private $method = 'GET';
    /**
     * @var string
     */
    private $url = '';
    /**
     * @var string
     */
    private $regex_url = '';
    /**
     * @var string
     */
    private $class_name = '';
    /**
     * @var string
     */
    private $method_name = '';
    /**
     * The function variable should work as a Closure.
     * TODO: Learn to do closures to implement them here.
     * @var string
     */
    private $function = '';

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {

        /**
         * If the URL does not end with a / we will add it
         */
        if( substr($url, -1) != '/' ){
            $url .= '/';
        }
        $this->url = $url;
        /**
         * We are going to make a replace to turn those "easy to read" patterns into preg match pattens
         */

        $this->regex_url = $url;
        $this->regex_url = str_replace('/' , '\/' , $this->regex_url) ;
        $this->regex_url = preg_replace([  self::PREG_REQUIRED , self::PREG_OPTIONAL ] , [  self::PREG_REPLACE_REQUIRED , self::PREG_REPLACE_OPTIONAL ], $this->regex_url);
        $this->regex_url .= '?'; // We are adding an ? at the end of the regular expression to indicate that we don't care if it ends on / or not
        //$this->regex_url = preg_replace(self::PREG_OPTIONAL , self::PREG_REPLACE_OPTIONAL, $url);
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->class_name;
    }

    /**
     * @param string $class_name
     */
    public function setClassName(string $class_name)
    {
        $this->class_name = $class_name;
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return $this->method_name;
    }

    /**
     * @param string $method_name
     */
    public function setMethodName(string $method_name)
    {
        $this->method_name = $method_name;
    }

    /**
     * @return string
     */
    public function getFunction(): string
    {
        return $this->function;
    }

    /**
     * @param string $function
     */
    public function setFunction(string $function)
    {
        $this->function = $function;
    }

    /**
     * @return string
     */
    public function getRegexUrl(): string
    {
        return $this->regex_url;
    }





}