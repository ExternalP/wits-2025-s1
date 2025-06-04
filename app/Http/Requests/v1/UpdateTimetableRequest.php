<?php

/**
 * Update Timetable Request.
 * - Handle HTTP request for updating a timetable.
 * 
 * Filename:        UpdateTimetableRequest.php
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

class UpdateTimetableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => ['sometimes', 'exists:courses,id'],
            'cluster_id' => ['sometimes', 'exists:clusters,id'],
            'start_date' => ['sometimes', 'date'],
            'start_time' => ['sometimes', 'date_format:H:i'],
            'session_duration' => ['sometimes', 'integer', 'min:1'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'lecturer_id' => ['sometimes', 'exists:users,id'],
        ];
    }
   
}
