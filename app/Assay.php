<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assay extends Model
{
    protected $table = 'assay';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'default'];

    /**
     * A assay can have many runs. Samples don't have a user_id currently.
     */
    public function runs()
    {
        return $this->hasMany('App\Run');
    }
}
