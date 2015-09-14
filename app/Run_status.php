<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Run_status
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Run[] $runs
 * @property integer $id
 * @property string $status
 * @property boolean $default
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Run_status whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run_status whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run_status whereDefault($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run_status whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run_status whereUpdatedAt($value)
 */
class Run_status extends Model
{
    protected $table = 'run_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status','default'];


    /**
     * A Run_status can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
