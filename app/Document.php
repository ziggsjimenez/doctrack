<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = ['description','amount','office_id','type_id','documentstatus_id'];
    public function office(){
        return $this->belongsTo('App\Office');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function documentstatus(){
        return $this->belongsTo('App\Documentstatus');
    }

    public function requirements(){

        return $this->hasMany('App\Docrequirement');
    }
}
