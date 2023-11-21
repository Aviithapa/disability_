<?php


namespace App\Http\Requests\DisabilityType;

use Illuminate\Foundation\Http\FormRequest;

class CreateDisabilityTypeRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name_nepali' => 'required|string',
            'name_english' => 'required|string',
            'points' => 'required|string',
            'type' => 'required|string',
            'color' => 'string'
        ];
    }
}
