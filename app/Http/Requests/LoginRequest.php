<?php

namespace App\Http\Requests;

use App\Http\Requests\Contracts\AuthorizedRequest;
use App\Http\Requests\Contracts\BaseRequest;

class LoginRequest extends BaseRequest
{
//    use AuthorizedRequest;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:191'],
            'password' => ['required', 'string', 'max:255']
        ];
    }
}
