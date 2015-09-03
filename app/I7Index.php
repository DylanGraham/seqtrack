<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class I7Index extends Model
{

    protected $table = 'i7_index';

    public function IndexSet()
    {
        return $this->belongsTo('App\IndexSet');
    }


    /**
     * A I7 Index can have many Sample.
     */
    public function sample()
    {
        return $this->hasMany('App\Sample');
    }
}
