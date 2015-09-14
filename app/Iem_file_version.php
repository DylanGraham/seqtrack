<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Iem_file_version
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Run[] $runs
 * @property integer $id
 * @property string $file_version
 * @property boolean $default
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Iem_file_version whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Iem_file_version whereFileVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Iem_file_version whereDefault($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Iem_file_version whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Iem_file_version whereUpdatedAt($value)
 */
class Iem_file_version extends Model
{
    protected $table = 'iem_file_version';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['file_version', 'default'];


    /**
     * A Iem_file_version can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
