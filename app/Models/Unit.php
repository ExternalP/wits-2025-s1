<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @mixin IdeHelperUnit
 * @property int $id
 * @property string $national_code
 * @property string $title
 * @property string $tga_status
 * @property string $state_code
 * @property int|null $nominal_hours
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cluster> $clusters
 * @property-read int|null $clusters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $courses
 * @property-read int|null $courses_count
 * @method static \Database\Factories\UnitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereNationalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereNominalHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereStateCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereTgaStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereUpdatedAt($value)
 * @mixin \Eloquent
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
