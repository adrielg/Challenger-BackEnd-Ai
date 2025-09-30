<?php

namespace App\Exception;

use Exception;

class JsonFileNotFoundException extends Exception
{
    public function __construct(string $message = 'The JSON file does not exist')
    {
        parent::__construct($message);
    }
}
