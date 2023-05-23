<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table = "salaries";
    public $timestamps = true;
    protected $fillable = ['employee_id', 'particular_id', 'ammount', 'status', 'description'];
    /*
        Employee
    */
    public function employee()
    {
        $this->belongsTo(Employee::class, 'employee_id');
    }
    /*
        Particular
    */
    public function particular()
    {
        $this->belongsTo(Particular::class, 'particular_id');
    }
}
