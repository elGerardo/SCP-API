<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\JsonValidationException;

class PostTypeRequest extends FormRequest
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
            "name.required" => "Parameter name is required",
            "name.string" => "Parameter name must be a string",

            "description.required" => "Parameter description is required",
            "description.string" => "Parameter description must be a string",
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
            'name' => 'required|string',
            'description' => 'required|string'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }
}
