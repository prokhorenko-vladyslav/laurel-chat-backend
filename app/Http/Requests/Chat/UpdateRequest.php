<?php

namespace App\Http\Requests\Chat;

use App\DTO\Chat\UpdateDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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

    public function getDTO(): UpdateDTO
    {
        return new UpdateDTO(
            $this->route('chat'),
            $this->input('name'),
            $this->input('members', [])
        );
    }
}
