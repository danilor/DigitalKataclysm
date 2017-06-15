<?php
/**
 * Created by PhpStorm.
 * User: danil
 * Date: 5/22/2017
 * Time: 9:57 AM
 */

namespace Kataclysm\Data;


/**
 * Class Request
 * @package Kataclysm\Data
 */
class Request
{

    // Different type of methods
    const METHOD_POST    = 'POST';
    const METHOD_GET     = 'GET';
    const METHOD_PUT     = 'PUT';
    const METHOD_HEAD    = 'HEAD';
    const METHOD_DELETE  = 'DELETE';
    const METHOD_OPTIONS = 'OPTIONS';

    /**
     * This will hold all the input of the request
     * @var array
     */
    private $input              =               [];

    /**
     * The type of method
     * @var string
     */
    private $method             =               'GET';

    /**
     * The own script
     * @var string
     */
    private $self               =               '';


    /**
     * The server address
     * @var string
     */
    private $server_address     =               '';

    /**
     * The server name
     * @var
     */
    private $server_name        =               '';

    /**
     * Indicates if this request was executed using secure connection
     * @var bool
     */
    private $secure_connection  =               false;

    /**
     * The request URI.
     * This will have only the string after the final /
     * @var string
     */
    private $uri                =               '';

    /**
     * This will harvest and hold the query string of the request
     * @var string
     */
    private $query_string       =               '';


    /**
     * This variable will contain the list of the segments
     * @var array
     */
    private $segments           =               [];


    /**
     * Request constructor.
     * It should automatically get all the informatino from the browser request
     */
    public function __construct( )
    {
        $this->capture();
    }

    /**
     * This function will capture all the request into the object.
     * We are not putting all this code into the constructor just to keep the class ordered
     */
    public function capture(){
        /**
         * Reading all the REQUEST variables
         */
        $this->input            =           $_REQUEST;

        /**
         * Reading the request method. It must be in upper
         */
        if( isset($_SERVER['REQUEST_METHOD']) ) $this->method           =           strtoupper( @$_SERVER['REQUEST_METHOD'] );

        /**
         * Reading the Current script
         */
        if( isset($_SERVER['PHP_SELF']) ) $this->self             =           @$_SERVER["PHP_SELF"];

        /**
         * Getting the server name and address
         */
        if( isset($_SERVER['SERVER_ADDR']) ) $this->server_address   =           $_SERVER["SERVER_ADDR"];
        if( isset($_SERVER['SERVER_NAME']) ) $this->server_name      =           $_SERVER["SERVER_NAME"];

        /**
         * Setting up if this was a secure connection
         */
        if( isset( $_SERVER["HTTPS"] ) && @$_SERVER["HTTPS"] != "" ){
            $this->secure_connection            =           true;
        }

        /**
         * Get the request URL
         */
        if( isset($_SERVER['REQUEST_URI']) ) $this->uri                              =           $_SERVER["REQUEST_URI"];

        /**
         * Get the query string
         */
        if( isset($_SERVER['QUERY_STRING']) ) $this->query_string                     =           $_SERVER['QUERY_STRING'];

        /**
         * Get the segments
         */
        $this->segments                         =           array_filter(explode( '/'    ,   $this->getUri() ));
    }

    /**
     * @return array
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Returns the current input key or a default value
     * @param $key
     * @param string $default
     * @return string The input value
     */
    public function input( string $key , string $default = '' ) : string{
        if( $this->existInput( $key ) ){
            return $this->input[ $key ];
        }else{
            return $default;
        }
    }

    /**
     * Return true if the key exist in the input
     * @param string $key
     * @return bool
     */
    public function existInput( string $key ) : bool
    {
        return ( isset($this->input[ $key ]) );
    }

    /**
     * @return string
     */
    public function getMethod() : string
    {
        return $this->method;
    }

    /**
     * Returns true if the method is a GET one
     * @return bool
     */
    public function isPost() : bool{
        return ( strtoupper($this->getMethod())  == self::METHOD_POST );
    }

    /**
     * Returns true if the method is a GET one
     * @return bool
     */
    public function isGET() : bool{
        return ( strtoupper($this->getMethod())  == self::METHOD_GET );
    }

    /**
     * Returns true if the method is a PUT one
     * @return bool
     */
    public function isPUT() : bool{
        return ( strtoupper($this->getMethod())  == self::METHOD_PUT );
    }

    /**
     * Returns true if the method is a HEAD one
     * @return bool
     */
    public function isHEAD() : bool{
        return ( strtoupper($this->getMethod())  == self::METHOD_HEAD );
    }

    /**
     * Returns true if the method is a DELETE one
     * @return bool
     */
    public function isDelete() : bool{
        return ( strtoupper($this->getMethod())  == self::METHOD_DELETE );
    }

    /**
     * Returns true if the method is a OPTIONS one
     * @return bool
     */
    public function isOptions() : bool{
        return ( strtoupper($this->getMethod())  == self::METHOD_OPTIONS );
    }

    /**
     * @return string
     */
    public function getSelf() : string
    {
        return $this->self;
    }

    /**
     * @return string
     */
    public function getServerAddress() : string
    {
        return $this->server_address;
    }

    /**
     * @return mixed
     */
    public function getServerName() : string
    {
        return $this->server_name;
    }

    /**
     * @return bool
     */
    public function isSecure() : bool
    {
        return $this->secure_connection;
    }

    /**
     * @param bool $autocomplete If true, and it the URI does not have the final /, it will add it
     * @return string
     */
    public function getUri( $autocomplete = true ) : string
    {
        $url = $this->uri;
        if( $autocomplete ){
            if( substr($url, -1) != '/' ){
                $url .= '/';
            }
        }
        return $url;
    }

    /**
     * This method will return the string of the segment in the URI.
     * If it does not exist it will return the default value indicating in the method
     * @param int $i
     * @param string $default
     * @return string
     */
    public function getSegment( int $i , string $default = '' ) : string{
        if( isset( $this->segments[ $i ] ) ){
            return $this->segments[ $i ];
        }
        return $default;
    }
}