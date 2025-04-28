<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @mixin IdeHelperCluster
 * @property int $id
 * @property string $code
 * @property string $title
 * @property string|null $qualification
 * @property string $state_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $courses
 * @property-read int|null $courses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Unit> $units
 * @property-read int|null $units_count
 * @method static \Database\Factories\ClusterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster whereStateCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cluster whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cluster extends Model
{
    /** @use HasFactory<\Database\Factories\ClusterFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'qualification',
        'state_code',
        // 'course_id',
    ];

    /**
     * @return BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_cluster',
            'cluster_id', 'course_id')
            ->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'cluster_unit',
            'cluster_id', 'unit_id')
            ->withTimestamps();
    }

    /*public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }*/

    /*public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }*/
}
