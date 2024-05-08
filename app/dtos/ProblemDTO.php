<?php

namespace App\dtos;

class ProblemDTO
{
    public function __construct(
        public string $customer_id,
        public string $name,
        public string $severity
    )
    {

    }

}
