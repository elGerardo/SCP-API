<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\JsonValidationException;

class PostSkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            "skill_name.required" => "Parameter name is required",
            "skill_name.string" => "Parameter name must be a string",

            "skill_description.required" => "Parameter description is required",
            "skill_description.string" => "Parameter description must be a string",
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'skill_name' => 'required|string',
            'skill_description' => 'required|string'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }
}
