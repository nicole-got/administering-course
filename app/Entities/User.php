<?php

namespace App\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    public $timestamps  = true;
    protected $table    = 'users';
    protected $fillable = ['name','email','password'];

    // public function getPasswordAttribute($value){
    //     $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;

    // }
}
