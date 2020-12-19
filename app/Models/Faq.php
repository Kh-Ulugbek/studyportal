<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory, Translatable;

    protected $guarded = ['id'];

    public function subject(){
        return $this->belongsTo('App\Models\FaqSubject');
    }
}
