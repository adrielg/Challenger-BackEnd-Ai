<?php

namespace App\UseCases;

use App\Services\ProductFileService;
use Exception;

class GetAllProduct
{
    private ProductFileService $fileService;

    public function __construct(ProductFileService $fileService) {
        $this->fileService = $fileService;
    }

    /**
     * @throws Exception
     */
    public function invoke(): array
    {
        return  $this->fileService->getAll();
    }
}
