<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Instrument
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Run[] $run
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Instrument whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Instrument whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Instrument whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Instrument whereUpdatedAt($value)
 */
class Instrument extends Model
{
    protected $table = 'instrument';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * A Iem_file_version can have many runs.

     */

    public function run()
    {
        return $this->hasMany('App\Run');
    }
}
