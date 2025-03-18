<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @mixin IdeHelperCourse
 */
class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'national_code',
        'aqf_level',
        'title',
        'tga_status',
        'state_code',
        'nominal_hours',
        'type',
        'package_id',
    ];

    /**
     * @return BelongsTo
     */
    public function package(): BelongsTo {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function clusters(): HasMany
    {
        return $this->hasMany(Cluster::class, 'course_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'course_unit',
            'course_id', 'unit_id')
            ->withTimestamps();
    }

    /*public function clusters(): BelongsToMany
    {
        return $this->belongsToMany(Cluster::class, 'course_cluster',
            'course_id', 'cluster_id')
            ->withTimestamps();
            // ->using(CourseCluster::class);
            // ->withPivot([]);
    }*/

    /*public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }*/
}
