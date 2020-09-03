<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function office(){
        return $this->belongsTo('App\Office');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function documentstatus(){
        return $this->belongsTo('App\Documentstatus');
    }
}
