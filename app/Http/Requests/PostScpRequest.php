<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\JsonValidationException;
use Illuminate\Foundation\Http\FormRequest;

class PostScpRequest extends FormRequest
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
            "id.required" => "Parameter id is required",
            "id.integer" => "Parameter id must be a number",

            "name.required" => "Parameter name is required",
            "name.string" => "Parameter name must be a string",
            
            "feeling.required" => "Parameter feeling is required",
            "feeling.string" => "Parameter feeling must be a string",
            
            "class_id.required" => "Parameter class_id is required",
            "class_id.integer" => "Parameter class_id must be a number",
            
            "type_id.required" => "Parameter type_id is required",
            "type_id.integer" => "Parameter type_id must be a number",
            
            "picture.required" => "Parameter picture is required",
            "picture.string" => "Parameter picture must be a string"
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
            "id" => "required|integer|unique:posts",
            "name" => "required|string|unique:posts",
            "feeling" => "required|string",
            "class_id" => "required|integer",
            "type_id" => "required|integer",
            "picture" => "required|string"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }
}
