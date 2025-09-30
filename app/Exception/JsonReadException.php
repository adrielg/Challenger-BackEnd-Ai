<?php

namespace App\Exception;

use Exception;

class JsonReadException extends Exception
{
    public function __construct()
    {
        parent::__construct("Error reading JSON file");
    }
}
