<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function type(){
        return $this->belongsTo('App\Models\ProgramTypes', 'program_type_id');
    }

    public function university(){
        return $this->belongsTo('App\Models\University');
    }

    public function faculty(){
        return $this->belongsTo('App\Models\Faculty');
    }

    public function duration(){
        return $this->belongsTo('App\Models\Duration');
    }

}
