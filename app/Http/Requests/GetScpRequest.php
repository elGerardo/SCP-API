<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\JsonValidationException;
use Illuminate\Foundation\Http\FormRequest;

class GetScpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'scp.required' => 'Parameter scp is required',
            'scp.numeric' => 'Parameter scp must be a number'
        ];
    }
    public function rules()
    {
        return [
            'scp' => 'required|numeric'
        ];
    }

     /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    /*protected function failedAuthorization()
    {
        throw new AuthorizationException;
    }*/

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
