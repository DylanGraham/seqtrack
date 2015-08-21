<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexSet extends Model
{

    public function I5Indexes()
    {
        return $this->hasMany('App\I5Index');
    }

    public function I7Indexes()
    {
        return $this->hasMany('App\I7Index');
    }

}
