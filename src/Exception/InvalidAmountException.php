<?php

namespace App\Exception;

class InvalidAmountException extends \Exception
{
    public function __construct($message = "Недопустимая сумма", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}