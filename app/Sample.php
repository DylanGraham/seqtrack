<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public function batches()
    {
        return $this->belongsTo('App\Batch');
    }

    /**
     * A Sample can have many SampleRun.
     */

    public function sampleRuns()
    {
        return $this->hasMany('App\SampleRun');
    }


}
