<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function requirements(){

        return $this->hasMany('App\Requirement');
    }
}
