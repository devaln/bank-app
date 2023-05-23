<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;
    protected $table = "account_types";
    public $timestamps = true;
    protected $fillable = ['type', 'loan_intrest_rate', 'saving_intrest_rate'];
    /* customer */
    public function account()
    {
        return $this->hasOne(Accounts::class);
    }
}
