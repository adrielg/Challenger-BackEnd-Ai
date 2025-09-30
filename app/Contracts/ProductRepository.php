<?php

namespace App\Contracts;

use App\Models\Product;

interface ProductRepository
{
    public function getAll():array;
    public function getById(string $id):Product;
}
