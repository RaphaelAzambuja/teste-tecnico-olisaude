<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_id', 'name', 'severity'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
