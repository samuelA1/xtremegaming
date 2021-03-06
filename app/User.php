<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'role_id', 'is_active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role () {
       return $this->belongsTo('App\Role');
    }

    public function post () {
        return $this->hasMany('App\Post');
    }

    public function comment() {
        return $this->hasMany('App\Comment');
    }

    public function reply() {
        return $this->hasMany('App\Reply');
    }

    public function isAdmin() {
        if ($this->role->name === 'administrator') {
            return true;
        }
            return false;

    }




}
