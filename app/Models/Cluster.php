<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cluster extends Model
{
    /** @use HasFactory<\Database\Factories\ClusterFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'qualification',
        'state_code',
    ];

    /**
     * @return BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_cluster',
            'cluster_id', 'course_id')
            ->withTimestamps();
        // ->using(CourseCluster::class);
        // ->withPivot([]);
    }

    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'cluster_unit',
            'cluster_id', 'unit_id')
            ->withTimestamps();
    }
}
