<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    protected $table = 'instrument';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * A Iem_file_version can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
