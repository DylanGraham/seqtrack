<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class I5Index extends Model
{

    public function IndexSet()
    {
        return $this->belongsTo('App\IndexSet');
    }

}
