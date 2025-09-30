<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductNotFoundException extends NotFoundHttpException
{
    /**
     *
     * @param string $message
     * @return void
     */
    public function __construct($message = "Product not found")
    {
        parent::__construct($message);
    }
}
