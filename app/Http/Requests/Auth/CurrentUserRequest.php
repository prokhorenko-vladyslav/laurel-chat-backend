<?php

namespace App\Http\Requests\Auth;

use App\DTO\Auth\CurrentUserDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CurrentUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function getDTO(): CurrentUserDTO
    {
        return new CurrentUserDTO(User::current());
    }
}
