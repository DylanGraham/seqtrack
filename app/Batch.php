<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batches';

    /**
     * A batch is owned by a user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A batch has many samples
     */
    public function samples()
    {
        return $this->hasMany('App\Sample');
    }

}
