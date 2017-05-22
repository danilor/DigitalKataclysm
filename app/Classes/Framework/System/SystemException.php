<?php

namespace Kataclysm\System;

use Throwable;

/**
 * Class SystemException
 * This class will allow us to manage our own exceptions
 * @package Kataclysm\System
 */
class SystemException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}