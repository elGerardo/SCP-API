<?php

namespace App\Exceptions;
use Illuminate\Contracts\Validation\Validator;
use Exception;

class JsonValidationException extends Exception
{
    protected $validator;
    //
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function report()
    {
        return false;
    }

    public function render($request)
    {
        return response()->json([
            'message' => 'Error',
            'status' => 422,
            'errors' => $this->validator->errors()
        ], 422);
    }

}
