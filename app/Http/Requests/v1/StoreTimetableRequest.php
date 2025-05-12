<?php

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
