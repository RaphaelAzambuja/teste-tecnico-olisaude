<?php

namespace App\Http\Controllers;

use App\dtos\CustomerDTO;
use App\repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        return $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->findAll();
    }

    public function show(int $id)
    {
        return $this->repository->findById($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'required|string',
            'gender' => 'required|string|in:Male,Female',
        ]);

        $customerDTO = new CustomerDTO(
            $validatedData['name'],
            $validatedData['date_of_birth'],
            $validatedData['gender']
        );

        return $this->repository->save($customerDTO);
    }

    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'date_of_birth' => 'required|string',
            'gender' => 'required|string|in:Male,Female',
        ]);

        $customerDTO = new CustomerDTO(
            $validatedData['name'],
            $validatedData['date_of_birth'],
            $validatedData['gender']
        );

        return $this->repository->update($customerDTO, $id);
    }

    public function destroy(int $id)
    {
        return $this->repository->delete($id);
    }

}
