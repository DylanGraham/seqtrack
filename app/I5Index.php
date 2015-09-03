<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class I5Index extends Model
{

    protected $table = 'i5_index';

    public function IndexSet()
    {
        return $this->belongsTo('App\IndexSet');
    }

    /**
     * A I5 Index can have many Sample.
     */
    public function sample()
    {
        return $this->hasMany('App\Sample');
    }

}
