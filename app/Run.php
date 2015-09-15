<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Run
 *
 * @property-read \App\Adaptor $adaptor
 * @property-read \App\Application $application
 * @property-read \App\Assay $assay
 * @property-read \App\Chemistry $chemistry
 * @property-read \App\Iem_file_version $iem_file_version
 * @property-read \App\Instrument $instrument
 * @property-read \App\Run_status $run_status
 * @property-read \App\Work_flow $work_flow
 * @property-read \App\User $users
 * @property-read \App\ProjectGroup $project_group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SampleRun[] $runs
 * @property integer $id
 * @property integer $project_group_id
 * @property integer $users_id
 * @property integer $instrument_id
 * @property integer $iem_file_version_id
 * @property string $experiment_name
 * @property string $run_date
 * @property integer $work_flow_id
 * @property integer $application_id
 * @property integer $assay_id
 * @property string $description
 * @property integer $chemistry_id
 * @property integer $read1
 * @property integer $read2
 * @property boolean $single_double
 * @property string $flow_cell
 * @property integer $adaptor_id
 * @property integer $run_status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereProjectGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereUsersId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereInstrumentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereIemFileVersionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereExperimentName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereRunDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereWorkFlowId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereApplicationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereAssayId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereChemistryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereRead1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereRead2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereSingleDouble($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereFlowCell($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereAdaptorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereRunStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Run whereUpdatedAt($value)
 */
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
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
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
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
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
