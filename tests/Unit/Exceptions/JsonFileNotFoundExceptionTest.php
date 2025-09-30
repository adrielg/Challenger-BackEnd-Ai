<?php

use App\Exception\JsonFileNotFoundException;

it('throws ProductNotFoundException with default message when no custom message is provided', function () {
    expect(fn() => throw new JsonFileNotFoundException())
        ->toThrow(JsonFileNotFoundException::class, 'The JSON file does not exist');
});

it('throws ProductNotFoundException with custom message when provided', function () {
    $customMessage = 'The requested product does not exist';
    expect(fn() => throw new JsonFileNotFoundException($customMessage))
        ->toThrow(JsonFileNotFoundException::class, $customMessage);
});
