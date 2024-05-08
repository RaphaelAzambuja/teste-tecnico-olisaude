<?php

namespace App\Http\Controllers;

use App\dtos\ProblemDTO;
use App\repositories\ProblemRepository;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    protected ProblemRepository $repository;

    public function __construct(ProblemRepository $repository)
    {
        return $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|int',
            'name' => 'required|string',
            'severity' => 'required|int',
        ]);

        $problemsDTO = new ProblemDTO(
            $validatedData['customer_id'],
            $validatedData['name'],
            $validatedData['severity']
        );

        return $this->repository->save($problemsDTO);
    }
}
