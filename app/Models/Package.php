<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperPackage
 */
class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;

    protected $fillable = [
        'national_code',
        'title',
        'tga_status',
    ];

    public function courses(): HasMany {
        return $this->hasMany(Course::class, 'course_id', 'id');
    }
}
