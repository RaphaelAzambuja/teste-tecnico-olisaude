<?php

namespace App\interfaces;

use App\dtos\CustomerDTO;
use Illuminate\Http\JsonResponse;

interface CustomerRepositoryInterface
{
    public function save(CustomerDTO $customer): JsonResponse;
    public function findAll(): JsonResponse;
    public function findById(int $id): JsonResponse;
    public function update(CustomerDTO $customer, int $id): JsonResponse;
    public function delete(int $id): JsonResponse;
}
