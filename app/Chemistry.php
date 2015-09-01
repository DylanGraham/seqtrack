<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chemistry extends Model
{
    protected $table = 'chemistry';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['chemistry', 'default'];


    /**
     * A Chemistry can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
