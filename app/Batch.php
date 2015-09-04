<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batches';

    protected $fillable = [
        'batch_name',
        'concentration',
        'volume',
        'tube_bar_code',
        'tube_location',
        'tape_station_length',
<<<<<<< HEAD
        'charge_code',
        'project_group_id'
=======
        'charge_code',    
        'project_group_id',
>>>>>>> 9c5fbc8429aad93f7a558fec375641787fccad5d
    ];

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

    public function project_group()
    {
        return $this->belongsTo('App\ProjectGroup');
    }

}
