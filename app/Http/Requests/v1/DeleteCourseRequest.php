<?php
/**
 * Request class for the API Course delete function.
 *
 * Filename:        DeleteCourseRequest.php
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

class DeleteCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // if (Auth::user()->cannot('course delete')) {
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
        return [];
    }
}

