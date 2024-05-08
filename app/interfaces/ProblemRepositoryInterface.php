<?php

namespace App\interfaces;

use App\dtos\ProblemDTO;
use Illuminate\Http\JsonResponse;

interface ProblemRepositoryInterface
{
    public function save(ProblemDTO $problem): JsonResponse;
}
