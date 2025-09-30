<?php

use App\Services\ProductFileService;
use App\UseCases\GetAllProduct;

it('returns all products from the file service', function () {

    $mockService = mock(ProductFileService::class)
        ->shouldReceive('getAll')
        ->once()
        ->andReturn([
            ['id' => 1, 'name' => 'Product 1', 'price' => 100],
            ['id' => 2, 'name' => 'Product 2', 'price' => 200],
        ])
        ->getMock();

    $useCase = new GetAllProduct($mockService);
    $result = $useCase->invoke();

    expect($result)->toHaveCount(2)
        ->and($result[0]['name'])->toBe('Product 1')
        ->and($result[1]['price'])->toBe(200);
});
