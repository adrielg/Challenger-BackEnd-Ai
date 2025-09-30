<?php

use App\Exception\ProductNotFoundException;

it('throws ProductNotFoundException with default message when no custom message is provided', function () {
    expect(fn() => throw new ProductNotFoundException())
        ->toThrow(ProductNotFoundException::class, 'Product not found');
});

it('throws ProductNotFoundException with custom message when provided', function () {
    $customMessage = 'The requested product does not exist';
    expect(fn() => throw new ProductNotFoundException($customMessage))
        ->toThrow(ProductNotFoundException::class, $customMessage);
});
