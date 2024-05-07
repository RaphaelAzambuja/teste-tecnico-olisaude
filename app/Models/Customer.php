<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date_of_birth', 'gender'
    ];

    public function problems()
    {
        return $this->hasMany(Problem::class);
    }
}
