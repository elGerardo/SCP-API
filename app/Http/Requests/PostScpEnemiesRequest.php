<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\JsonValidationException;

class PostScpEnemiesRequest extends FormRequest
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
            //
            "scp_id.required" => "Parameter scp_id is required",
            "scp_id.integer" => "Parameter scp_id must be integer",
            
            "enemies.required" => "Parameter enemies is required",
            "enemies.array" => "Parameter enemies must be an array",

            "enemies.*" => "Array items are required",
            "enemies.*" => "Array items are must be integer",
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
            "enemies" => "required|array",
            "scp_id" => "required|integer",
            "enemies.*" => "required|integer",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }
}
