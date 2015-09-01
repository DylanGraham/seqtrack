<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adaptor extends Model
{
    protected $table = 'adaptor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'default'];


    /**
     * A adaptor can have many runs.

    */

    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
