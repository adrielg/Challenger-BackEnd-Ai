<?php

namespace Tests\Feature\Http\Api;

use App\Models\Product;
use App\UseCases\GetAllProduct;
use App\UseCases\GetProduct;
use App\Exception\ProductNotFoundException;
use Illuminate\Testing\Fluent\AssertableJson;

it('returns all products successfully', function () {
    // Mock GetAllProduct
    $this->mock(GetAllProduct::class, function ($mock) {
        $mock->shouldReceive('invoke')
            ->once()
            ->andReturn([
                ['id' => 1, 'name' => 'Product 1', 'price' => 100],
                ['id' => 2, 'name' => 'Product 2', 'price' => 200],
            ]);
    });

    $response = $this->getJson('/api/items');

    $response->assertOk()
        ->assertJson(fn (AssertableJson $json) =>
        $json->has(2)
            ->where('0.name', 'Product 1')
            ->where('1.price', 200)
        );
});

it('returns a single product successfully', function () {
    // Mock GetProduct
    $this->mock(GetProduct::class, function ($mock) {
        $mock->shouldReceive('invoke')
            ->with('1')
            ->once()
            ->andReturn(new Product([
                'id' => 1,
                'name' => 'Product 1',
                'price' => 100,
            ]));
    });

    $response = $this->getJson('/api/items/1');

    $response->assertOk()
        ->assertJson(fn (AssertableJson $json) =>
        $json->where('id', 1)
            ->where('name', 'Product 1')
            ->etc()
        );
});

it('returns 404 when product is not found', function () {
    $this->mock(GetProduct::class, function ($mock) {
        $mock->shouldReceive('invoke')
            ->with('99')
            ->once()
            ->andThrow(new ProductNotFoundException('Product not found'));
    });

    $response = $this->getJson('/api/items/99');

    $response->assertNotFound()
        ->assertJson(fn (AssertableJson $json) =>
        $json->where('error', 'Product not found')
        );
});
