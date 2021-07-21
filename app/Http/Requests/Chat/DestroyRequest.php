<?php

namespace App\Http\Requests\Chat;

use App\DTO\Chat\DestroyDTO;
use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
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

    public function getDTO(): DestroyDTO
    {
       return new DestroyDTO(
           $this->route('chat')
       );
    }
}
