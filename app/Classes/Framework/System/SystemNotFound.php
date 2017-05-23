<?php


namespace Kataclysm\System;

use Throwable;

/**
 * Class SystemNotFound
 * This class should be trigger when there is no routes or file not found in the site.
 * @package Kataclysm\System
 */
class SystemNotFound extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}