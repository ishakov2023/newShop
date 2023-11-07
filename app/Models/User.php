<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model
{
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
