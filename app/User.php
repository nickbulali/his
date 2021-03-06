<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function patient()
    {
        return $this->hasOne('App\Models\Patient', 'created_by');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

    public function telecom()
    {
        return $this->hasMany('App\Models\Telecom', 'created_by');
    }

    public function name()
    {
        return $this->hasOne('App\Models\Name', 'created_by');
    }

    // public function loader()
    // {
    //     return User::find($this->id)->load(
    //         'specimenReceived', 'specimenCollected'
    //     );
    // }
}
