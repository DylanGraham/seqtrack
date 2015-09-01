<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
