<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    protected $primaryKey = 'company_id'; // Set the primary key field name

    protected $fillable = [
        'name',
        'industry',
        'company_details',
        'state',
        'country',
    ];

    protected $casts = [
        'company_details' => 'json', // Specify that "company_details" is a JSON field
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'company_id');
    }
}