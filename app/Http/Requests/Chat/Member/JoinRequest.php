<?php

namespace App\Http\Requests\Chat\Member;

use App\DTO\Chat\Member\JoinDTO;
use Illuminate\Foundation\Http\FormRequest;

class JoinRequest extends FormRequest
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

    public function getDTO(): JoinDTO
    {
        return new JoinDTO(
            $this->route('chat'),
            $this->route('user')
        );
    }
}
