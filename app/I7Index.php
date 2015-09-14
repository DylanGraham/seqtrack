<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\I7Index
 *
 * @property-read \App\IndexSet $IndexSet
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sample[] $sample
 * @property integer $id
 * @property integer $index_set_id
 * @property string $index
 * @property string $sequence
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\I7Index whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I7Index whereIndexSetId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I7Index whereIndex($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I7Index whereSequence($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I7Index whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I7Index whereUpdatedAt($value)
 */
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
