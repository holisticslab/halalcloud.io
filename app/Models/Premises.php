<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premises extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'state',
        'premise_details',
        // Add other premise-related fields here
    ];

    protected $casts = [
        'premise_details' => 'json', // Specify that "premise_details" is a JSON field
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
