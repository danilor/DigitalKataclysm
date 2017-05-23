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
        $this->url = $url;
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



}