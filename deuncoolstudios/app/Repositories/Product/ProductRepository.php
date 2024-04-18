<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepositories;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository extends BaseRepositories implements ProductRepositoryInterface{
    public function getModel(){
        return Product::class;
    }
}