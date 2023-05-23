<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Particular extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "particulars";
    public $timestamps = true;
    protected $fillable = ['card_id', 'sender_id', 'receiver_id', 'ammount', 'description'];
    /*
        card
    */
    public function cards()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
    /*
        Sender
    */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    /*
        receiver
    */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    /*
        salary
    */
    public function salary()
    {
        return $this->hasMany(Salary::class);
    }
    /*
        User sender
    */
    /* public function sender_user()
    {
       $sender = User::select('*')->join('particulars', 'particulars.sender_id', '=', 'users.id')->first();
       return $sender;
    } */
    /*
        User Receiver
    */
    /* public function receiver_user()
    {
       $reciever = User::select('*')->join('particulars', 'particulars.receiver_id', '=', 'users.id')
    //    ->where('users.id', '=', 'particulars.receiver_id')
       ->first();
       return $reciever;
    } */
    /*
        Operations
    */
    public function CurrentBalance()
    {
        //
    }
}
