<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Work_flow
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Run[] $runs
 * @property integer $id
 * @property string $value
 * @property boolean $default
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Work_flow whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Work_flow whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Work_flow whereDefault($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Work_flow whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Work_flow whereUpdatedAt($value)
 */
class Work_flow extends Model
{
    protected $table = 'work_flow';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value','default'];


    /**
     * A Work_flow can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
