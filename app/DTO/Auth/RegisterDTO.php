<?php

namespace App\DTO\Auth;

use App\Abstracts\DTO;
use Illuminate\Support\Facades\Hash;

class RegisterDTO extends DTO
{
    protected string $name;
    protected string $email;
    protected string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return Hash::make($this->password);
    }
}
