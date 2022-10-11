<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\JsonValidationException;
use Illuminate\Foundation\Http\FormRequest;

class GetRangeRequest extends FormRequest
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
            'first.required' => 'Parameter first is required',
            'first.numeric' => 'Parameter first must be a numeric',
            'last.required' => 'Parameter last is required',
            'last.numeric' => 'Parameter last must be a numeric',
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
            'first' => 'required|numeric',
            'last' => 'required|numeric',
        ];
    }

        /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new JsonValidationException($validator);
    }
}
