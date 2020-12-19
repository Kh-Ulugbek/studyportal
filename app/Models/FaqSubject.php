<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqSubject extends Model
{
    use HasFactory, Translatable;

    protected $guarded = ['id'];

    public function faqs(){
        return $this->hasMany('App\Models\Faq', 'subject_id');
    }
}
