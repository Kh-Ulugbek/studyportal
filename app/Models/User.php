<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'login', 'last_name'
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

    public function articles(){
        return $this->hasMany('App\Models\Article');
    }

    public function reviews(){
        return $this->hasMany('App\Models\studentsReview');
    }

    public function userData(){
        return $this->hasOne('App\Models\userData');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function getVisitedAttribute($value)
    {
        if ($value)
        return Carbon::parse($value);
        return $value;
    }

    public function alerts(){
        return $this->hasMany('App\Models\Alert');
    }

    public function bookmarks(){
        return $this->belongsToMany('App\Models\University');
    }

    public function files(){
        return $this->hasMany('App\Models\UserFile');
    }

    public function checklists(){
        return $this->hasMany('App\Models\Checklist');
    }





}
