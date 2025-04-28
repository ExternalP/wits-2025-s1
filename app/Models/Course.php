<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * 
 *
 * @mixin IdeHelperCourse
 * @property int $id
 * @property string $national_code
 * @property string $aqf_level
 * @property string $title
 * @property string $tga_status
 * @property string $state_code
 * @property int|null $nominal_hours
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $package_id
 * @property-read Collection<int, \App\Models\Cluster> $clusters
 * @property-read int|null $clusters_count
 * @property-read \App\Models\Package $package
 * @property-read Collection<int, \App\Models\Unit> $units
 * @property-read int|null $units_count
 * @method static \Database\Factories\CourseFactory factory($count = null, $state = [])
 * @method static Builder<static>|Course newModelQuery()
 * @method static Builder<static>|Course newQuery()
 * @method static Builder<static>|Course query()
 * @method static Builder<static>|Course whereAqfLevel($value)
 * @method static Builder<static>|Course whereCreatedAt($value)
 * @method static Builder<static>|Course whereId($value)
 * @method static Builder<static>|Course whereNationalCode($value)
 * @method static Builder<static>|Course whereNominalHours($value)
 * @method static Builder<static>|Course wherePackageId($value)
 * @method static Builder<static>|Course whereStateCode($value)
 * @method static Builder<static>|Course whereTgaStatus($value)
 * @method static Builder<static>|Course whereTitle($value)
 * @method static Builder<static>|Course whereType($value)
 * @method static Builder<static>|Course whereUpdatedAt($value)
 * @mixin \Eloquent
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
     * @return BelongsToMany
     */
    public function clusters(): BelongsToMany
    {
        return $this->belongsToMany(Cluster::class, 'course_cluster',
            'course_id', 'cluster_id')
            ->withTimestamps();
        // ->using(CourseCluster::class);
        // ->withPivot([]);
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

    /**
     * Returns array of the unique aqf_level values.
     * @return array
     */
    public static function uniqueAqfs(): array
    {
        // return Course::select('aqf_level')->distinct()->get(['aqf_level']);
        return Course::select('aqf_level')->distinct()->pluck('aqf_level')->toArray();
    }

    /**
     * Array of valid TGA Statuses.
     * - So if it changes I don't have to search everywhere to fix it.
     * @return string[]
     */
    public static function tgaStatuses(): array
    {
        return ['Current', 'Expired',  'Replaced'];
    }

    /*public function clusters(): HasMany
    {
        return $this->hasMany(Cluster::class, 'course_id', 'id');
    }*/

    /*public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }*/
}
