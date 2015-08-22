<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexSet extends Model
{

    protected $table = 'index_set';

    public function sets()
    {
        $index_sets = IndexSet::lists('index_set');
        return $index_sets;
    }

    public function I5Indexes()
    {
        return $this->hasMany('App\I5Index');
    }

    public function I7Indexes()
    {
        return $this->hasMany('App\I7Index');
    }

    
}
