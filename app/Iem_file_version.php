<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iem_file_version extends Model
{
    protected $table = 'iem_file_version';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['file_version', 'default'];


    /**
     * A Iem_file_version can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
