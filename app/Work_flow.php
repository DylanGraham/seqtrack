<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_flow extends Model
{
    protected $table = 'work_flow';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value','default'];


    /**
     * A Work_flow can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
