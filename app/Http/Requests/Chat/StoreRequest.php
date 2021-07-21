<?php

namespace App\Http\Requests\Chat;

use App\DTO\Chat\StoreDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'members' => [ 'array', 'max:100' ],
            'members.*' => [
                'numeric',
                Rule::exists('users', 'id')->whereNot('id', User::currentId())
            ]
        ];
    }

    public function getDTO(): StoreDTO
    {
        return new StoreDTO(
            $this->input('name'),
            User::currentId(),
            $this->input('members', [])
        );
    }
}
