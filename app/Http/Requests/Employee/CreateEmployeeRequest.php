<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'name_nepali' => ['required', 'string', 'max:255'],
            'name_english' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:active,in-active'],
            'photo' => ['required', 'string', 'max:255'],
            'red_signature' => ['required', 'string', 'max:255'],
            'black_signature' => ['required', 'string', 'max:255'],
            'stamp' => ['required', 'string', 'max:255'],
        ];
    }
}
