<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sample
 *
 * @property-read \App\User $user
 * @property-read \App\Batch $batch
 * @property-read \App\I7Index $i7_index
 * @property-read \App\I5Index $i5_index
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SampleRun[] $sampleRuns
 * @property integer $batch_id
 * @property integer $id
 * @property string $sample_id
 * @property string $plate
 * @property string $well
 * @property integer $i7_index_id
 * @property integer $i5_index_id
 * @property string $description
 * @property integer $runs_remaining
 * @property integer $instrument_lane
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereBatchId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereSampleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample wherePlate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereWell($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereI7IndexId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereI5IndexId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereRunsRemaining($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereInstrumentLane($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sample whereUpdatedAt($value)
 */
class Sample extends Model
{
    protected $fillable = [
        'batch_id',
        'project_group_id',
        'sample_id',
        'plate',
        'well',
        'i7_index_id',
        'i5_index_id',
        'description',
        'runs_remaining',
        'instrument_lane',
    ];

    /**
     * A sample is owned by a user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A sample belongs to a batch
     */
    public function batch()
    {
        return $this->belongsTo('App\Batch');
    }

    /**
     * A sample belongs to a i7 Index
     */
    public function i7_index()
    {
        return $this->belongsTo('App\I7Index');
    }

    /**
     * A sample belongs to a i5 Index
     */
    public function i5_index()
    {
        return $this->belongsTo('App\I5Index');
    }


    /**
     * A Sample can have many SampleRun.
     */

    public function sampleRuns()
    {
        return $this->hasMany('App\SampleRun');
    }


}
