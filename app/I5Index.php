<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\I5Index
 *
 * @property-read \App\IndexSet $IndexSet
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sample[] $sample
 * @property integer $id
 * @property integer $index_set_id
 * @property string $index
 * @property string $sequence
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\I5Index whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I5Index whereIndexSetId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I5Index whereIndex($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I5Index whereSequence($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I5Index whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\I5Index whereUpdatedAt($value)
 */
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
