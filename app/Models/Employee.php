<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";
    public $timestamps = true;
    protected $fillable = ['department_id', 'account_id', 'education', 'date_of_joining', 'work_status', 'designation', 'official_email', 'salary_ammount'];
    /*
        Department
    */
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    /*
        Manager
    */
    public function manager()
    {
        return $this->belongsTo(self::class, 'manager_id')->withTrashed();
    }
    /*
        accounts
    */
    public function account()
    {
        return $this->belongsTo(Accounts::class, 'account_id');
    }
    /*
        accountable
    */
    public function employee()
    {
        return $this->morphOne(User::class, 'accountable');
    }
    /*
        salary
    */
    public function salary()
    {
        return $this->hasMany(Salary::class);
    }
}
