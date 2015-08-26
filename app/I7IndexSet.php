<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class I7IndexSet extends Model
{

    protected $table = 'i7_index_set';

    public function sets()
    {
        $index_sets = I7IndexSet::lists('index_set');
        return $index_sets;
    }

    public function I7Indexes()
    {
        return $this->hasMany('App\I7Index');
    }

    
}
