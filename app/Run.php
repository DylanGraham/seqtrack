<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    protected $fillable = [
       'adaptor_id',
        'application_id',
        'assay_id',
        'chemistry_id',
        'created_at',
        'description',
        'experiment_name',
        'flow_cell',
        'iem_file_version_id',
        'instrument_id',
        'project_group_id',
        'read1',
        'read2',
        'run_date',
        'run_status_id',
        'single_double',
        'updated_at',
        'user_id',
        'work_flow_id'
    ];
    /**
     * A Runs belongs to a Adaptor
     */
    public function adaptor()
    {
        return $this->belongsTo('App\Adaptor');
    }

    /**
     * A Runs belongs to a Applications
     */
    public function application()
    {
        return $this->belongsTo('App\Application');
    }

    /**
     * A Runs belongs to a Assays
     */    public function assay()
    {
        return $this->belongsTo('App\Assay');
    }

    /**
     * A Runs belongs to a Chemistry
     */
    public function chemistry()
    {
        return $this->belongsTo('App\Chemistry');
    }

    /**
     * A Runs belongs to a Iem_file_version
     */
    public function iem_file_version()
    {
        return $this->belongsTo('App\Iem_file_version');
    }

    /**
     * A Runs belongs to a Instrument
     */
    public function instrument()
    {
        return $this->belongsTo('App\Instrument');
    }

    /**
     * A Runs belongs to a Run_status
     */
    public function run_status()
    {
        return $this->belongsTo('App\Run_status');
    }

    /**
     * A Runs belongs to a work_flow
     */
    public function work_flow()
    {
        return $this->belongsTo('App\Work_flow');
    }

    /**
     * A Runs belongs to a User
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A Runs belongs to a Project Group
     */
    public function project_group()
    {
        return $this->belongsTo('App\ProjectGroup');
    }

    /**
    * A Run can have many SampleRun.
    */
    public function runs()
    {
        return $this->hasMany('App\SampleRun');
    }

}
