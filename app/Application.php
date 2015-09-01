<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'application';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['application', 'default'];


    /**
     * A Application can have many runs.

     */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
