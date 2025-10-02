<?php

namespace Tests\Unit\Services;

use App\Exception\JsonFileNotFoundException;
use App\Exception\JsonReadException;
use App\Models\Product;
use App\Services\ProductFileService;

beforeEach(function () {
    // Carpeta temporal para archivos JSON de prueba
    $this->tempDir = __DIR__ . '/temp_json';
    if (!file_exists($this->tempDir)) {
        mkdir($this->tempDir, 0777, true);
    }
});

afterEach(function () {
    // Limpiar archivos temporales
    foreach (glob($this->tempDir . '/*.json') as $file) {
        unlink($file);
    }
    rmdir($this->tempDir);
});

it('returns all products when JSON file contains multiple valid items', function () {
    $path = $this->tempDir . '/valid.json';
    $json = json_encode([
        ['id' => 1, 'name' => 'Product 1', 'price' => 100],
        ['id' => 2, 'name' => 'Product 2', 'price' => 200]
    ]);
    file_put_contents($path, $json);

    $service = new ProductFileService($path);
    $result = $service->getAll();

    expect($result)->toHaveCount(2)
        ->and($result[0]['id'])->toBe(1)
        ->and($result[1]['name'])->toBe('Product 2');
});

it('returns one product when JSON file contains multiple valid items', function () {
    $path = $this->tempDir . '/valid.json';
    $json = json_encode([
        ['id' => 1, 'name' => 'Product 1', 'price' => 100],
        ['id' => 2, 'name' => 'Product 2', 'price' => 200]
    ]);
    file_put_contents($path, $json);

    $service = new ProductFileService($path);
    $product = $service->getById('2');

    expect($product)->toBeInstanceOf(Product::class)
        ->and($product->id)->toBe(2)
        ->and($product->name)->toBe('Product 2')
        ->and($product->price)->toBe(200);
});

it('throws JsonFileNotFoundException with correct message when JSON file is missing', function () {
    $service = new ProductFileService('/ruta/falsa/products.json');

    expect(fn() => $service->getAll())
        ->toThrow(JsonFileNotFoundException::class, 'The JSON file does not exist');
});

it('throws JsonFileNotFoundException when attempting to retrieve a product by id and file is missing', function () {
    $service = new ProductFileService('/ruta/falsa/products.json');

    expect(fn() => $service->getById('1'))
        ->toThrow(JsonFileNotFoundException::class, 'The JSON file does not exist');
});

//Si le pasás un path válido pero sin permisos de lectura, file_get_contents() devuelve false.
//Simulamos esto creando un archivo temporal sin permisos:
it('throws JsonReadException with correct message when JSON file cannot be read', function () {
    // Ruta absoluta a un archivo temporal
    $path = __DIR__ . '/unreadable.json';
    file_put_contents($path, '{"id":1}');

    // Quitar permisos
    chmod($path, 0000);

    $service = new ProductFileService($path);

    expect(fn() => $service->getAll())
        ->toThrow(JsonReadException::class, 'Error reading JSON file');

    // Restaurar permisos y borrar
    chmod($path, 0644);
    unlink($path);
});

it('throws JsonReadException when attempting to retrieve a product by id and file cannot be read', function () {
    // Ruta absoluta a un archivo temporal
    $path = __DIR__ . '/unreadable.json';
    file_put_contents($path, '{"id":1}');

    // Quitar permisos
    chmod($path, 0000);

    $service = new ProductFileService($path);

    expect(fn() => $service->getById('1'))
        ->toThrow(JsonReadException::class, 'Error reading JSON file');

    // Restaurar permisos y borrar
    chmod($path, 0644);
    unlink($path);
});

it('throws JsonReadException when JSON is invalid', function () {
    // Crear archivo temporal con JSON inválido
    $path = __DIR__ . '/invalid.json';
    file_put_contents($path, '{ invalid json }'); // <- mal formado

    $service = new ProductFileService($path);

    expect(fn() => $service->getAll())
        ->toThrow(JsonReadException::class,'Error decoding JSON');

    // Limpiar
    unlink($path);
});

it('throws JsonReadException when JSON file is empty', function () {
    // Archivo temporal con array vacío
    $path = __DIR__ . '/empty.json';
    file_put_contents($path, '[]');

    $service = new ProductFileService($path);

    expect(fn() => $service->getAll())
        ->toThrow(JsonReadException::class, 'No items were found in the JSON file');

    unlink($path);
});
