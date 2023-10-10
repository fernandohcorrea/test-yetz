<?php

namespace App\Exceptions;

/**
 * Custom Http Exception
 */
class CustomHttpException extends \Exception
{
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
