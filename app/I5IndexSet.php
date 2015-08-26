<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class I5IndexSet extends Model
{

    protected $table = 'i5_index_set';

    public function sets()
    {
        $index_sets = I5IndexSet::lists('i5_index_set');
        return $index_sets;
    }

    public function I5Indexes()
    {
        return $this->hasMany('App\I5Index');
    }

    
}
