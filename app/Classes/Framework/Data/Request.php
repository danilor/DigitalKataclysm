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
     * Request constructor.
     * It should automatically get all the informatino from the browser request
     */
    public function __construct( )
    {
        /**
         * Reading all the REQUEST variables
         */
        $this->input            =           $_REQUEST;

        /**
         * Reading the request method. It must be in upper
         */
        $this->method           =           strtoupper( @$_SERVER['REQUEST_METHOD'] );

        /**
         * Reading the Current script
         */
        $this->self             =           @$_SERVER["PHP_SELF"];

        /**
         * Getting the server name and address
         */
        $this->server_address   =           $_SERVER["SERVER_ADDR"];
        $this->server_name      =           $_SERVER["SERVER_NAME"];

        /**
         * Setting up if this was a secure connection
         */
        if( $_SERVER["HTTPS"] != "" ){
            $this->secure_connection            =           true;
        }

        /**
         * Get the request URL
         */
        $this->uri                              =           $_SERVER["REQUEST_URI"];

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
        return ( strtoupper($this->getMethod())  == "POST" );
    }

    /**
     * Returns true if the method is a GET one
     * @return bool
     */
    public function isGET() : bool{
        return ( strtoupper($this->getMethod())  == "GET" );
    }

    /**
     * Returns true if the method is a PUT one
     * @return bool
     */
    public function isPUT() : bool{
        return ( strtoupper($this->getMethod())  == "PUT" );
    }

    /**
     * Returns true if the method is a HEAD one
     * @return bool
     */
    public function isHEAD() : bool{
        return ( strtoupper($this->getMethod())  == "HEAD" );
    }

    /**
     * Returns true if the method is a DELETE one
     * @return bool
     */
    public function isDelete() : bool{
        return ( strtoupper($this->getMethod())  == "DELETE" );
    }

    /**
     * Returns true if the method is a OPTIONS one
     * @return bool
     */
    public function isOptions() : bool{
        return ( strtoupper($this->getMethod())  == "OPTIONS" );
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
     * @return string
     */
    public function getUri() : string
    {
        return $this->uri;
    }




}