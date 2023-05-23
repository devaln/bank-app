<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;
    protected $table = "nominees";
    public $timestamps = true;
    protected $fillable = ['account_id', 'first_name', 'last_name', 'contact', 'date_of_birth', 'gender', 'relation'];
    /* customer */
    public function account()
    {
        return $this->belongsTo(Accounts::class);
    }
    /*
        addressable
    */
    public function nominee()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
