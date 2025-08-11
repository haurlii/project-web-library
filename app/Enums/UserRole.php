<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'Admin';
    case USER = 'User';

    public static function options(): array
    {
        return collect(self::cases())->map(fn($item) => [
            'value' => $item->value,
            'label' => $item->name,
        ])->values()->toArray();
    }
}
