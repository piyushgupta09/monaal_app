<?php

namespace App\Models;

use Fpaipl\Authy\Models\User as AuthyUser;

class User extends AuthyUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'otpcode',
        'utype',
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
        'approved_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getTableData($key)
    {
        switch ($key) {
            case 'role': return $this->roles->first()->name;
            default: return $this->{$key};
        }
    }

    public function partyDetails()
    {
        if ($this->hasRole('customer')) {
            return $this->hasOne('Fpaipl\Stocky\Models\Customer', 'user_id');
        } elseif ($this->hasRole('supplier')) {
            return $this->hasOne('Fpaipl\Stocky\Models\Supplier', 'user_id');
        }
    }

}
