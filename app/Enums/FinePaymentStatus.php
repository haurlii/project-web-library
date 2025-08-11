<?php

namespace App\Enums;

enum FinePaymentStatus: string
{
    case PENDING = 'Belum bayar';
    case SUCCESS = 'Lunas';

    public static function options(): array
    {
        return collect(self::cases())->map(fn($item) => [
            'value' => $item->value,
            'label' => $item->value,
        ])->values()->toArray();
    }
}
