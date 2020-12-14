<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory, Translatable;

    protected $guarded = ['id'];

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function images(){
        return $this->hasMany('App\Models\UniversityImages');
    }

    public function faculties(){
        return $this->belongsToMany('App\Models\Faculty');
    }

    public function programs(){
        return $this->hasMany('App\Models\Program');
    }

    public function userBookmarks(){
        return $this->belongsToMany('App\Models\User');
    }

}
