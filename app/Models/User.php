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
        'admin',
    ];
    protected $casts = [
        'admin' => 'boolean',
        'password' => 'encrypted'
    ];
}
