<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Application
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Run[] $runs
 * @property integer $id
 * @property string $application
 * @property boolean $default
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereApplication($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereDefault($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereUpdatedAt($value)
 */
class Application extends Model
{
    protected $table = 'application';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['application', 'default'];


    /**
     * A Application can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
