<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Run_status extends Model
{
    protected $table = 'run_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status','default'];


    /**
     * A Run_status can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
