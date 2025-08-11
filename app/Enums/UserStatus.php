<?php

namespace App\Enums;

enum UserStatus: string
{
    case ISACTIVE = 'Aktif';
    case INACTIVE = 'Tidak Aktif';
    case GRADUATE = 'Lulus';
    case MOVED = 'Pindah';
    case DROPPED = 'Keluar';

    public static function options(): array
    {
        return collect(self::cases())->map(fn($item) => [
            'value' => $item->value,
            'label' => $item->label,
        ])->values()->toArray();
    }
}
