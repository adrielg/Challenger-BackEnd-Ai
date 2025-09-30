<?php

use App\Exception\JsonReadException;

it('throws ProductNotFoundException with default message when no custom message is provided', function () {
    expect(fn() => throw new JsonReadException())
        ->toThrow(JsonReadException::class, 'Error reading JSON file');
});

it('throws ProductNotFoundException with custom message when provided', function () {
    $customMessage = 'The requested product does not exist';
    expect(fn() => throw new JsonReadException($customMessage))
        ->toThrow(JsonReadException::class, $customMessage);
});
