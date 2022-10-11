<?php

namespace App\Exceptions;

use Exception;

class GetScpException extends Exception
{
    //
    public function context()
    {
        return ['scpId' => 'Must be a integer'];
    }
}
