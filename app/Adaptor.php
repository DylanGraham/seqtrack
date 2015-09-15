<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Adaptor
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Run[] $runs
 * @property integer $id
 * @property string $value
 * @property boolean $default
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Adaptor whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Adaptor whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Adaptor whereDefault($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Adaptor whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Adaptor whereUpdatedAt($value)
 */
class Adaptor extends Model
{
    protected $table = 'adaptor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'default'];


    /**
     * A adaptor can have many runs.
    */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
