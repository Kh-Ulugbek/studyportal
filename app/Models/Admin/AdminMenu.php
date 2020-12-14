<?php

namespace App\Models\Admin;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    use HasFactory, Translatable;

    public function sub_menu(){

        return $this->hasMany('App\Models\Admin\AdminMenu', 'parent');

    }
}
