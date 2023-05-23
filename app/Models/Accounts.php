<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    protected $table = "accounts";
    public $timestamps = true;
    protected $fillable = ['account_type_id', 'account_number', 'account_limit', 'current_balance', 'account_status'];
    /*
        accountable
    */
    public function user()
    {
        return $this->morphOne(User::class, 'accountable');
    }
    /*
        Account Type
    */
    public function account_type()
    {
        return $this->belongsTo(AccountType::class);
    }
    /*
        Employee
    */
    public function employee()
    {
        $this->hasOne(Employee::class);
    }
    /*
        Nominee
    */
    public function nominee()
    {
        $this->hasOne(Nominee::class);
    }
    /*
        Card
    */
    public function card()
    {
        $this->hasOne(Card::class);
    }
}
