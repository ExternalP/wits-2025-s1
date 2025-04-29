<?php
/**
 * DESCRIPTION_BUT_EACH_LINE_HAS_MAX_LENGTH_OF_96_CHARACTERS
 *
 * Filename:        StoreCourseRequest.php
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
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Make sure to run cleanCourseRequest() before validation.

        return [
            'package_id' => ['required', 'integer', 'exists:packages,id',],
            'national_code' => ['required', 'string', 'min:4', 'max:10', 'uppercase', 'alpha_num', /*Rule::unique('courses', 'national_code')*/],
            'aqf_level' => ['required', 'string', 'min:1', 'max:100',],
            'title' => ['required', 'string', 'min:1', 'max:255',],
            'tga_status' => ['sometimes', 'nullable', 'string', Rule::in(Course::tgaStatuses())],
            'state_code' => ['required', 'string', 'min:4', 'max:10', 'uppercase', 'alpha_num',],
            'nominal_hours' => ['sometimes', 'nullable', 'integer', 'min:0', 'max:10000',],
            'type' => ['sometimes', 'nullable', 'string', 'min:1', 'max:50',],
            'cluster_id' => ['sometimes', 'exists:clusters,id',],
            'unit_id' => ['sometimes', 'exists:units,id',],
        ];
    }
}

