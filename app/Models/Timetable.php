<?php

/**
 *  Timetable Model.
 * - Handle HTTP request for storing a timetable.
 * 
 * Filename:        TimetableController.php
 * Location:        app/Http/Requests/v1
 * Project:         wits-2025-s1
 * Date Created:    22/04/2025
 *
 * Author:          Luis Alvarez<20114831@tafe.wa.edu.au>
 * Student ID:      20114831
 *
 * Assessment:      WITS-2025-S1
 * Cluster:         SaaS: Part 2 – Back End Development
 * Qualification:   ICT50220 Diploma of Information Technology (Back End Web Development)
 * Year/Semester:   2025/S1
 *
 */

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

