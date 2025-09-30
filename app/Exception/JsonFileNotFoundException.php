<?php

namespace App\Exception;

use Exception;

class JsonFileNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("The JSON file does not exist");
    }
}
