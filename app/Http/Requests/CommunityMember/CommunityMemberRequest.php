<?php

namespace App\Http\Requests\CommunityMember;

use Illuminate\Foundation\Http\FormRequest;

class CommunityMemberRequest extends FormRequest
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
            'citizenship' => 'required|unique:community_members,citizenship',
            'name' => 'required|string',
            'occupation' => 'string',
            'email' => 'sometimes|nullable|unique:community_members,email',
            'phone_number' => 'sometimes|nullable|unique:community_members,phone_number',
            'parent_citizenship' => 'sometimes|nullable|exists:community_members,citizenship',
            'mother_citizenship' => 'sometimes|nullable|exists:community_members,citizenship',
            // 'marital_status' => 'required|in:single,married',
            'spouse_citizenship' => 'sometimes|nullable|exists:community_members,citizenship',
        ];
    }
}
