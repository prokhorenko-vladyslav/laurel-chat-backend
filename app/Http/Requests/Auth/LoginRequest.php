<?php

namespace App\Http\Requests\Auth;

use App\DTO\Auth\LoginDTO;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [ 'required', 'email', 'string', 'max:255' ],
            'password' => [ 'required', 'string', 'max:255' ]
        ];
    }

    public function getDTO(): LoginDTO
    {
        return new LoginDTO(
            $this->input('email'),
            $this->input('password')
        );
    }
}
