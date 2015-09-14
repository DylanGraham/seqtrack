<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProjectGroup
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Batch[] $batch
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectGroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectGroup whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectGroup whereUpdatedAt($value)
 */
class ProjectGroup extends Model
{
    protected $table = 'project_group';

    protected $fillable = ['name'];

    /**
     * A project group has many batches
     */
    public function batch()
    {
        return $this->hasMany('App\Batch');
    }
    
}
