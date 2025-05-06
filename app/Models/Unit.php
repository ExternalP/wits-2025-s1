<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperUnit
 */
class Unit extends Model
{
    /** @use HasFactory<\Database\Factories\UnitFactory> */
    use HasFactory;

    protected $fillable = [
        'national_code',
        'title',
        'tga_status',
        'state_code',
        'nominal_hours',
    ];

    public function clusters(): BelongsToMany
    {
        return $this->belongsToMany(Cluster::class, 'cluster_unit',
            'unit_id', 'cluster_id')
            ->withTimestamps();
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_unit',
            'unit_id', 'course_id')
            ->withTimestamps();
    }


    //A unit can belong to multiple timetables.
    public function timetables()
    {
        return $this->belongsToMany(Timetable::class, 'timetable_unit');
    }
}
