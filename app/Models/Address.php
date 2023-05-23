<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = "addresses";
    public $timestamps = true;
    protected $fillable = ['addressable', 'address_text', 'state', 'district', 'zip_code'];
    /*
        addressable
    */
    public function addressable()
    {
        return $this->morphTo();
    }
}
