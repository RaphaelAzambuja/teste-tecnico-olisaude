<?php

namespace App\repositories;

use App\dtos\CustomerDTO;
use App\interfaces\CustomerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function save(CustomerDTO $customer): JsonResponse
    {
        try {
            $newCustomer = new Customer();
            $newCustomer->name = $customer->name;
            $newCustomer->date_of_birth = $customer->date_of_birth;
            $newCustomer->gender = $customer->gender;
            $newCustomer->save();

            return response()->json(['success' => true, 'message' => 'Customer saved successfully', 'data' => $newCustomer], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error while saving customer', 'error' => $e->getMessage()], 500);
        }

    }

    public function findAll(): JsonResponse
    {
        try {
            $customers = Customer::paginate(15);
            return response()->json(['success'=> true, 'data'=> $customers],200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error while fetching customers', 'error' => $e->getMessage()], 500);
        }
    }

    public function findById(int $id): JsonResponse
    {
        try {
            $customer = Customer::query()->where('id', $id)->first();
            if ($customer) {
                return response()->json(['success' => true, 'data' => $customer],200);
            }

            return response()->json(['success' => false, 'message' => 'Customer not found', 'error' => 'Customer not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error while fetching customer by id', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(CustomerDTO $customer, int $id): JsonResponse
    {
        try {
            $currentCustomer = Customer::find($id);

            if (!$currentCustomer) {
                return response()->json(['success' => false, 'message' => 'Customer not found'], 404);
            }

            $currentCustomer->name = $customer->name;
            $currentCustomer->date_of_birth = $customer->date_of_birth;
            $currentCustomer->gender = $customer->gender;
            $currentCustomer->save();

            return response()->json([
                'success' => true,
                'message' => 'Customer updated successfully',
                'data' => $currentCustomer
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error while updating customer', 'error' => $e->getMessage()], 500);
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            Customer::query()->where("id", $id)->delete();
            return response()->json(["message"=> "Customer deleted successfully"],200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error while deleting customer', 'error' => $e->getMessage()], 500);
        }
    }
}
