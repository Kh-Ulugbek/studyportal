<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryFAQ extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function answers(){
        return $this->hasMany('App\Models\CountryAnswer', 'faq_id');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
}
