<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    /**
     * A Runs belongs to a Adaptor
     */
    public function adaptors()
    {
        return $this->belongsTo('App\Adaptor');
    }

    /**
     * A Runs belongs to a Applications
     */
    public function applications()
    {
        return $this->belongsTo('App\Application');
    }

    /**
     * A Runs belongs to a Assays
     */    public function assays()
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
    public function iem_file_versions()
    {
        return $this->belongsTo('App\Iem_file_version');
    }

    /**
     * A Runs belongs to a Instrument
     */
    public function instruments()
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
    public function work_flows()
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
    public function project_groups()
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
