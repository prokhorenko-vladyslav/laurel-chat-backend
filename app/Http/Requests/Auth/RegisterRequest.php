<?php

namespace App\Http\Requests\Auth;

use App\DTO\Auth\RegisterDTO;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'required', 'unique:users,email', 'email', 'string', 'max:255' ],
            'password' => [ 'required', 'alpha_dash', 'string', 'max:255', 'confirmed' ],
        ];
    }

    public function getDTO(): RegisterDTO
    {
        return new RegisterDTO(
            $this->input('name'),
            $this->input('email'),
            $this->input('password'),
        );
    }
}
