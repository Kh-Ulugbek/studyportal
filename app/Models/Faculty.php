<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function universities(){
        return $this->belongsToMany('App\Models\University');
    }

    public function programs(){
        return $this->hasMany('App\Models\Program');
    }
}
