<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Assay
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Run[] $runs
 * @property integer $id
 * @property string $name
 * @property boolean $default
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Assay whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assay whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assay whereDefault($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assay whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assay whereUpdatedAt($value)
 */
class Assay extends Model
{
    protected $table = 'assay';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'default'];

    /**
     * A assay can have many runs. Samples don't have a user_id currently.
     */
    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
