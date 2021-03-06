<?php

namespace Kataclysm\System;


use Throwable;

/**
 * Class SystemError
 * This class will allow us to manage our own system errors
 * @package Kataclysm\System
 */
class SystemError extends \Error
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}