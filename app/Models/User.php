<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $fillable =
        [
          'name',
          'email',
          'admin',
          'password',
        ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'admin'=>'boolean',
        'password' => 'encrypted'
    ];
    public function admin(){
        return $this->admin;
    }
    public function basket()
    {
        return $this->hasOne(Basket::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
