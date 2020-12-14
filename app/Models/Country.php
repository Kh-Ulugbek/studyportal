<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Country extends Model
{
    use HasFactory, Translatable;
    use Sluggable;

    protected $guarded = ['id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function info(){
        return $this->hasOne('App\Models\CountryInfo');
    }

    public function faqs(){
        return $this->hasMany('App\Models\CountryFAQ');
    }
}
