<?php

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
