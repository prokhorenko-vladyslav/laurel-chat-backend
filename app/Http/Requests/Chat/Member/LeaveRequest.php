<?php

namespace App\Http\Requests\Chat\Member;

use App\DTO\Chat\Member\LeaveDTO;
use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
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

    public function getDTO(): LeaveDTO
    {
        return new LeaveDTO(
            $this->route('chat'),
            $this->route('user')
        );
    }
}
