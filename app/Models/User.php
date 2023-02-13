<?php

namespace App\Models;

use App\Btcsell;
use App\Message;
use App\Recharge;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','balance', 'isUnread','twofa','app_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'banned_until'
    ];

    public function bank(){
        return $this->hasOne(Bank::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function withdraws(){
        return $this->hasMany(Withdraw::class);
    }
    public function wallet(){
        return $this->hasOne(Wallet::class);
    }
    public function recharges(){
        return $this->hasMany(Recharge::class);
    }
    public function cardorders(){
        return $this->hasMany(Cardorder::class);
    }

    public function btcsells(){
        return $this->hasMany(Btcsell::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
