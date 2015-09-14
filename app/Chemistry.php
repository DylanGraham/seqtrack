<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Chemistry
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Run[] $runs
 * @property integer $id
 * @property string $chemistry
 * @property boolean $default
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Chemistry whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chemistry whereChemistry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chemistry whereDefault($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chemistry whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Chemistry whereUpdatedAt($value)
 */
class Chemistry extends Model
{
    protected $table = 'chemistry';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['chemistry', 'default'];


    /**
     * A Chemistry can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
