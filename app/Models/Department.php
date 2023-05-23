<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";
    public $timestamps = true;
    protected $fillable = ['name', 'employee_count'];
    /*
        Employee
    */
    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
