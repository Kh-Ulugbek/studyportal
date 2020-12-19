<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTypes extends Model
{
    use HasFactory, Translatable;
    protected $guarded = ['id'];

    public function programs(){
        return $this->hasMany('App\Models\Program', 'program_type_id');
    }
}
