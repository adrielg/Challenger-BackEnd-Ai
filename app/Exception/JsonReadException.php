<?php

namespace App\Exception;

use Exception;

class JsonReadException extends Exception
{
    public function __construct(string $message = "Error reading JSON file")
    {
        parent::__construct($message);
    }
}
