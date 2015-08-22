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

}
