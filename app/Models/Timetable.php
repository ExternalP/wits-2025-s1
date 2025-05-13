<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTimetable
 */
class Timetable extends Model
{
    protected $fillable = [
        'course_id',
        'cluster_id',
        'start_date',
        'start_time',
        'session_duration',
        'end_date',
        'lecturer_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

   //Timetables based on an specific course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

  //Timetables based on an specific cluster
    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

   //Timetables based on an specific lecturer
    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    //Units that are taught on timetables
    public function units()
    {
        return $this->belongsToMany(Unit::class, 'timetable_unit');
    }

   //Clusters that are taught on timetables 
    public function clusters()
    {
        return $this->belongsToMany(Cluster::class, 'timetable_cluster');
    }
}

