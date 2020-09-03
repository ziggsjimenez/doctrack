<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docrequirement extends Model
{
    public function document()
    {

        return $this->belongsTo('App\Document');
    }

    public function requirement(){

        return $this->belongsTo('App\Requirement');
    }

    public function requirementstatus(){
        return $this->belongsTo('App\Requirementstatus');
    }
}
