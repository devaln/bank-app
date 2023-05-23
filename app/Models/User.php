<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'accountable',
        'avatar',
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'date_of_birth',
        'gender',
        'pan_card_number',
        'adhaar_card_number',
        'maritial_status',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
        User
    */
    public function accountable()
    {
        return $this->morphTo();
    }
    /*
        addressable
    */
    public function user()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
    /*
        Sender
    */
    public function sender()
    {
        return $this->belongsTo(Particular::class, 'sender_id');
    }
    /*
        receiver
    */
    public function receiver()
    {
        return $this->belongsTo(Particular::class, 'receiver_id');
    }
}
