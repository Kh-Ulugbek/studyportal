<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqSubject extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function faqs(){
        return $this->hasMany('App\Models\Faq', 'subject_id');
    }
}
