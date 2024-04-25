<?php

namespace App\Models;

use Fpaipl\Panel\Models\Chat;
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

    public function chats()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }

    public function myDepartment()
    {
        if ($this->hasRole('order-manager')) {
            return 'Order Section';
        } elseif ($this->hasRole('store-manager')) {
            return 'Store Section';
        } elseif ($this->hasRole('account-manager')) {
            return 'Account Section';
        } elseif ($this->hasRole('data-manager')) {
            return 'Data Section';
        } elseif ($this->hasRole('qc-manager')) {
            return 'QC Section';
        } elseif ($this->hasRole('manager')) {
            return 'Admin Office';
        } elseif ($this->hasRole('owner')) {
            return 'Head Office';
        } else {
            return 'User';
        }
    }

    public function senderName()
    {
        if ($this->myChat()) {
            return 'You';
        } else {
            return $this->name;
        }
    }

    public function myChat()
    {
        return $this->id === auth()->id();
    }
}
