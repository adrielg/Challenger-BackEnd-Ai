<?php

namespace App\Services;

use App\Contracts\ProductRepository;
use App\Exception\JsonFileNotFoundException;
use App\Exception\JsonReadException;
use App\Exception\ProductNotFoundException;
use App\Models\Product;

class ProductFileService implements ProductRepository
{
    private string $jsonPath;

    public function __construct(?string $jsonPath = null)
    {
        $this->jsonPath = $jsonPath ?? base_path('database/data/items.json');
    }

    /**
     * @throws JsonFileNotFoundException
     * @throws JsonReadException
     */
    private function readFile(): array
    {
        if (!file_exists($this->jsonPath)) {
            throw new JsonFileNotFoundException("The JSON file does not exist");
        }

        $jsonContent = file_get_contents($this->jsonPath);
        if ($jsonContent === false) {
            throw new JsonReadException("Error reading JSON file");
        }

        $items = json_decode($jsonContent, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonReadException("Error decoding JSON: " . json_last_error_msg());
        }

        if (!is_array($items) || empty($items)) {
            throw new JsonReadException("No items were found in the JSON file");
        }

        return $items;
    }


    /**
     * @throws JsonFileNotFoundException
     * @throws JsonReadException
     */
    public function getAll(): array
    {
        return $this->readFile();
    }

    /**
     * @throws JsonFileNotFoundException
     * @throws JsonReadException
     * @throws ProductNotFoundException
     */
    public function getById(string $id): Product
    {
        $items = $this->readFile();

        foreach ($items as $item) {
            if ((string)$item['id'] === $id) {
                return new Product($item);
            }
        }

        throw new ProductNotFoundException();
    }
}
