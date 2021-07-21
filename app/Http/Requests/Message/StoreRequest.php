<?php

namespace App\Http\Requests\Message;

use App\DTO\Message\StoreDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

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
            'text' => [ 'required', 'string', 'max:10000' ]
        ];
    }

    public function getDTO(): StoreDTO
    {
         return new StoreDTO(
             $this->input('text'),
             $this->route('chat')->id,
             User::currentId()
         );
    }
}
