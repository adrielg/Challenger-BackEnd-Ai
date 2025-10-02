<?php
namespace App\Http\Api;

use App\Exception\JsonFileNotFoundException;
use App\Exception\JsonReadException;
use App\Exception\ProductNotFoundException;
use App\Http\Controllers\Controller;
use App\UseCases\GetAllProduct;
use App\UseCases\GetProduct;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private GetProduct $getProduct;
    private GetAllProduct $getAllProduct;

    public function __construct(GetProduct $getProduct, GetAllProduct $getAllProduct)
    {
        $this->getProduct = $getProduct;
        $this->getAllProduct = $getAllProduct;
    }

    public function index():JsonResponse
    {
        try{
            $products = $this->getAllProduct->invoke();
        } catch (JsonFileNotFoundException|JsonReadException $e) {
            return response()->json(['error' => $e->getMessage()], 500, [], JSON_PRETTY_PRINT);
        } catch (ProductNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404, [], JSON_PRETTY_PRINT);
        } catch (Exception $ex) {
            return response()->json(['error' => 'An error occurred. '.$ex->getMessage()], 500, [], JSON_PRETTY_PRINT);
        }

        return response()->json($products, 200, [], JSON_PRETTY_PRINT);
    }

    public function show( string $id):JsonResponse
    {
        try {
            $product = $this->getProduct->invoke($id);
        } catch (ProductNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404, [], JSON_PRETTY_PRINT);
        } catch (Exception $ex) {
            return response()->json(['error' => 'An error occurred. '.$ex->getMessage()], 500, [], JSON_PRETTY_PRINT);
        }

        return response()->json($product, 200, [], JSON_PRETTY_PRINT);
    }
}
