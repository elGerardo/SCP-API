<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\JsonValidationException;
use Illuminate\Foundation\Http\FormRequest;

class PostFeatureRequest extends FormRequest
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
            "scp_id.required" => "Parameter scp_id is required",
            "scp_id.integer" => "Parameter scp_id must be a number",

            "short_description.required" => "Parameter short_description is required",
            "short_description.string" => "Parameter short_description must be a string",
            
            "full_description.required" => "Parameter full_description is required",
            "full_description.string" => "Parameter full_description must be a string",
            
            "color.required" => "Parameter color is required",
            "color.string" => "Parameter color must be a string",
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
            "scp_id" => "required|integer",
            "short_description" => "required|string",
            "full_description" => "required|string",
            "color" => "required|string",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }
}
