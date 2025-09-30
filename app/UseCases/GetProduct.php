<?php

namespace App\UseCases;

use App\Models\Product;
use App\Services\ProductFileService;
use Egulias\EmailValidator\Result\Reason\ExceptionFound;
use Exception;

/**
 * @method getById(string $id)
 */
class GetProduct
{
    private ProductFileService $fileService;

    public function __construct(ProductFileService $fileService) {
        $this->fileService = $fileService;
    }

    public function invoke(string $id): Product
    {
        return  $this->fileService->getById($id);
    }
}
