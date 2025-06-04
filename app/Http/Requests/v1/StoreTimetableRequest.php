<?php
/**
 * Store Timetable Request.
 * - Handle HTTP request for storing a timetable.
 * 
 * Filename:        StoreTimetableRequest.php
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

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimetableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id',
            'cluster_id' => 'required|exists:clusters,id',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'session_duration' => 'required|integer|min:1',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'lecturer_id' => 'required|exists:users,id',
        ];
    }
}
