<?php

namespace App\Http\Requests\Message;

use App\DTO\Message\UpdateDTO;
use Illuminate\Foundation\Http\FormRequest;

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
            'text' => [ 'required', 'string', 'max:10000' ]
        ];
    }

    public function getDTO(): UpdateDTO
    {
        return new UpdateDTO(
            $this->route('message'),
            $this->input('text')
        );
    }
}
