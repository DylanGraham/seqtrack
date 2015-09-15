<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SampleRun
 *
 * @property-read \App\Run $runs
 * @property-read \App\Sample $samples
 * @property integer $run_id
 * @property integer $sample_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\SampleRun whereRunId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SampleRun whereSampleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SampleRun whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SampleRun whereUpdatedAt($value)
 */
class SampleRun extends Model
{
    protected $table = 'sample_runs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sample_id','run_id'];


    /**
     * A SampleRun belongs to a sample

     */
    public function runs()
    {
        return $this->belongsTo('App\Run');
    }

    /**
     * A SampleRun belongs to a run.

     */
    public function samples()
    {
        return $this->belongsTo('App\Sample');
    }

}
