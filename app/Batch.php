<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Batch
 *
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sample[] $samples
 * @property-read \App\ProjectGroup $project_group
 * @property integer $id
 * @property integer $user_id
 * @property string $batch_name
 * @property integer $project_group_id
 * @property float $concentration
 * @property float $volume
 * @property string $tube_bar_code
 * @property string $tube_location
 * @property float $tape_station_length
 * @property string $charge_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereBatchName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereProjectGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereConcentration($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereVolume($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereTubeBarCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereTubeLocation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereTapeStationLength($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereChargeCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Batch whereUpdatedAt($value)
 */
class Batch extends Model
{
    protected $table = 'batches';

    protected $fillable = [
        'batch_name',
        'concentration',
        'volume',
        'tube_bar_code',
        'tube_location',
        'tape_station_length',
        'charge_code',
        'project_group_id'


    ];

    /**
     * A batch is owned by a user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A batch has many samples
     */
    public function samples()
    {
        return $this->hasMany('App\Sample');
    }

    public function project_group()
    {
        return $this->belongsTo('App\ProjectGroup');
    }

}
