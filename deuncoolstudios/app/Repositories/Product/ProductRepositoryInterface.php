<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoriesInterface;

interface ProductRepositoryInterface extends RepositoriesInterface{
    public function all();
    public function find(int $id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}