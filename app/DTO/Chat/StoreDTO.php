<?php

namespace App\DTO\Chat;

use App\Abstracts\DTO;
use App\Models\Chat;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class StoreDTO extends DTO
{
    protected string $name;
    protected int $ownerId;
    protected Collection $members;

    public function __construct(string $name, int $ownerId, array $members = [])
    {
        $members = collect($members);
        Chat::validateMembers($members);

        $this->name = $name;
        $this->ownerId = $ownerId;
        $this->members = $members;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    public function getMembers(): Collection
    {
        return $this->members;
    }
}
