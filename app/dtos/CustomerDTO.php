<?php

namespace App\dtos;

use Illuminate\Support\Facades\Date;

class CustomerDTO
{
    public function __construct(
        public string $name,
        public string $date_of_birth,
        public string $gender,
    )
    {

    }
}
