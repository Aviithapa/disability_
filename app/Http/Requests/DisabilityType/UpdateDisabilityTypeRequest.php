<?php


namespace App\Http\Requests\DisabilityType;

use App\Modules\Framework\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDisabilityTypeRequest extends FormRequest
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
