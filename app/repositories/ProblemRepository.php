<?php

namespace App\repositories;
use App\dtos\ProblemDTO;
use App\Models\Problem;
use Illuminate\Http\JsonResponse;

class ProblemRepository
{
    public function save(ProblemDTO $problem): JsonResponse
    {
        try {
            $newProblem = new Problem() ;
            $newProblem->customer_id = $problem->customer_id;
            $newProblem->name = $problem->name;
            $newProblem->severity = $problem->severity;
            $newProblem->save();

            return response()->json(['success' => true, 'message' => 'Problem saved successfully', 'data' => $newProblem], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error while saving problem', 'error' => $e->getMessage()], 500);
        }

    }
}
