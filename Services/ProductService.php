<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\TenantRepository;

class ProductService
{
    protected $productRepository, $tenantRepository;

    public function __construct(
        ProductRepository $productRepository,
        TenantRepository $tenantRepository
    ) {
        $this->productRepository = $productRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getProductsByTenantUuid(string $uuid, array $categories)
    {

        /**
        * Pegando o resturante pelo token
        *
        */
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        /**
        * Pegando os produtos
        *
        */
        return $this->productRepository->getproductsByTenantId($tenant->id, $categories);
    }

    public function getProductByUuid(string $uuid)
    {
        return $this->productRepository->getProductByUuid($uuid);
    }

}
