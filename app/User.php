<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'email', 'provider', 'provider_id', 'img', 'email_verified_at', 'password', 'token', 'role', 'status',
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

    public function admin(){
        if ($this->role > 0) {// role = 2
            return true;
        }
        return false;
    }

    public function superAdmin(){
        if ($this->role == 1) {//role = 1
            return true;
        }
        return false;
    }

    public function menus() {
        return $this->hasMany(Menu::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }
    
    public function orders(){
        return $this->hasMany(Order::class);
    }
    
    public function messages(){
        return $this->morphMany(Message::class, 'messageable');
    }
    
    public function biodata(){
        return $this->hasOne(Biodata::class);
    }
    
    public function threads(){
        return $this->hasMany(Forum::class);
    }
    
}
