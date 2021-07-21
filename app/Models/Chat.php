<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function validateMembers(Collection $members)
    {
        $members->each(function ($member) {
            if (!is_numeric($member)) {
                throw new InvalidArgumentException('Members collection must contains only ids chat members must be users');
            }
        });
    }

    public function isOwner(int $userId): bool
    {
        return $this->owner_id === $userId;
    }

    public function isMember(int $userId): bool
    {
        return $this->isOwner($userId) || $this->members()->where('user_id', $userId)->exists();
    }
}
