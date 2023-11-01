<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'employees'; // Specify the table name

    protected $fillable = [
        'name',
        'position',
        'company_id',
        'role_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
