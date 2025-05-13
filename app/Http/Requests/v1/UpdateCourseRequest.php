<?php
/**
 * Request class for the API Course update function.
 *
 * Filename:        UpdateCourseRequest.php
 * Location:        app/Http/Requests/v1/
 * Project:         wits-2025-s1
 * Date Created:    22/4/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 *
 */

namespace App\Http\Requests\v1;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        // if (Auth::user()->cannot('course edit')) {
        //     return false;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Make sure to run cleanCourseRequest() after validation.

        return [
            'package_id' => ['sometimes', 'integer', 'exists:packages,id',],
            'national_code' => [
                'sometimes', 'string', 'min:4', 'max:10', 'alpha_num',
                Rule::unique('courses', 'national_code')
                    ->where('aqf_level', $this->input('aqf_level'))
                    ->where('title', $this->input('title'))
                    ->where('tga_status', $this->input('tga_status') ?: 'Current')
                    ->where('state_code', $this->input('state_code'))
                    ->ignore($this->route('course')),
            ],
            'aqf_level' => [
                'sometimes', 'string', 'min:1', 'max:100',
                Rule::unique('courses', 'aqf_level')
                    ->where('national_code', $this->input('national_code'))
                    ->where('title', $this->input('title'))
                    ->where('tga_status', $this->input('tga_status') ?: 'Current')
                    ->where('state_code', $this->input('state_code'))
                    ->ignore($this->route('course'))
            ],
            'title' => [
                'sometimes', 'string', 'min:1', 'max:255',
                Rule::unique('courses', 'title')
                    ->where('national_code', $this->input('national_code'))
                    ->where('aqf_level', $this->input('aqf_level'))
                    ->where('tga_status', $this->input('tga_status') ?: 'Current')
                    ->where('state_code', $this->input('state_code'))
                    ->ignore($this->route('course'))
            ],
            'tga_status' => [
                'sometimes', 'nullable', 'string', Rule::in(Course::tgaStatuses()),
                Rule::unique('courses', 'tga_status')
                    ->where('national_code', $this->input('national_code'))
                    ->where('title', $this->input('title'))
                    ->where('aqf_level', $this->input('aqf_level'))
                    ->where('state_code', $this->input('state_code'))
                    ->ignore($this->route('course'))
            ],
            'state_code' => [
                'sometimes', 'string', 'min:4', 'max:10', 'uppercase', 'alpha_num',
                Rule::unique('courses', 'state_code')
                    ->where('national_code', $this->input('national_code'))
                    ->where('title', $this->input('title'))
                    ->where('tga_status', $this->input('tga_status') ?: 'Current')
                    ->where('aqf_level', $this->input('aqf_level'))
                    ->ignore($this->route('course'))
            ],
            'nominal_hours' => ['sometimes', 'nullable', 'integer', 'min:0', 'max:10000',],
            'type' => ['sometimes', 'nullable', 'string', 'min:1', 'max:50',],
            'cluster_id' => ['sometimes', 'exists:clusters,id',],
            'unit_id' => ['sometimes', 'exists:units,id',],
        ];
    }

    /**
     * Overrides the default validation error messages.
     *  - Can specify which fields & validation-types to override.
     * @return string[]
     */
    public function messages(): array
    {
        $uniqueMsg = 'Courses must be unique. Another record has the same values for its national_code, aqf_level, title, tga_status & state_code.';
        // $uniqueMsg = 'Courses must be unique. Another record has the same values for its National Code, AQF Level, Title, TGA Status & State Code.';

        return [
            'aqf_level.unique' => $uniqueMsg,
            'title.unique' => $uniqueMsg,
            'tga_status.unique' => $uniqueMsg,
            'state_code.unique' => $uniqueMsg,
        ];
    }
}

