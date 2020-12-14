<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityImages extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function university(){
        return $this->belongsTo('App\Models\University');
    }
}
