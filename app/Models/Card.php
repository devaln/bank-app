<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table = "cards";
    public $timestamps = true;
    protected $fillable = ['account_id', 'title', 'number', 'expiry_date', 'cvv_code', 'status'];
    /*
        Customer
    */
    public function account()
    {
        return $this->belongsTo(Accounts::class);
    }
    /*
        Particular
    */
    public function particular()
    {
        return $this->hasMany(Particular::class);
    }
}
