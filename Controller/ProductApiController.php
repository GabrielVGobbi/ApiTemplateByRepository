<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
    * Buscando Produtos de um determinado Restaurante
    *
    */
    public function productsByTenant(Request $request)
    {

        /**
        * A Controller chama o serviço relacionado a Produto
        *
        */
        $products = $this->productService->getProductsByTenantUuid(
            $request->token_company,
            $request->get('categories', [])
        );

        return ProductResource::collection($products);
    }
}
