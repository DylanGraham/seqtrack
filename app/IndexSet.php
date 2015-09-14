<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\IndexSet
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\I7Index[] $I7Indexes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\I5Index[] $I5Indexes
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\IndexSet whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\IndexSet whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\IndexSet whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\IndexSet whereUpdatedAt($value)
 */
class IndexSet extends Model
{

    protected $table = 'index_set';

    public function sets()
    {
        $index_sets = IndexSet::lists('index_set');
        return $index_sets;
    }

    public function I7Indexes()
    {
        return $this->hasMany('App\I7Index');
    }

    public function I5Indexes()
    {
        return $this->hasMany('App\I5Index');
    }
    
}
