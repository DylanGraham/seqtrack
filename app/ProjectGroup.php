<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    protected $table = 'project_group';

    /**
     * A project group has many batches
     */
    public function batch()
    {
        return $this->hasMany('App\Batch');
    }
    
}
