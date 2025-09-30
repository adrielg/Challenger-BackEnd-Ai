<?php

use App\Models\Product;
use App\Services\ProductFileService;
use App\UseCases\GetProduct;

beforeEach(function () {
    // Creamos un mock del servicio
    $this->fileService = Mockery::mock(ProductFileService::class);
    $this->getProduct = new GetProduct($this->fileService);
});

it('returns product when valid id is provided', function () {
    $productData = [
        'id' => 1,
        'name' => 'Test Product',
        'price' => 100,
        'imageUrl' => 'http://example.com/img.png',
        'description' => 'Test desc',
        'rating' => 5,
        'specifications' => ['ram' => '8GB']
    ];

    $product = new Product($productData);

    // Mockeamos getById
    $this->fileService
        ->shouldReceive('getById')
        ->with('1')
        ->andReturn($product);

    $result = $this->getProduct->invoke('1');

    expect($result)->toBeInstanceOf(Product::class)
        ->and($result->id)->toBe(1)
        ->and($result->name)->toBe('Test Product');
});

it('throws exception when product is not found', function () {
    // Configuramos el mock para lanzar excepción
    $this->fileService
        ->shouldReceive('getById')
        ->with('999')
        ->andThrow(new Exception('Product not found'));

    $this->getProduct->invoke('999');
})->throws(Exception::class, 'Product not found');
