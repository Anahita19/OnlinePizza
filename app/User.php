<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name','phone','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function photos()
//    {
//      return $this->hasMany(Photo::class);
//    }
//
    public function products()
    {
      return $this->hasMany(Product::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function isAdmin()
    {
        foreach ($this->roles as $role){
            if($role->name == 'manager' && $this->status == 1){
                return true;
            }
        }
        return false;
    }
//
    public function addresses()
    {
      return $this->hasMany(Address::class);
    }

    public function orders(){
      return $this->hasMany(Order::class);
    }
}
