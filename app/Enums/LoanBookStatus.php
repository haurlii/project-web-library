<?php

namespace App\Enums;

enum LoanBookStatus: string
{
    case RETURNED = 'Dikembalikan';
    case LOAN = 'Dipinjam';
    case FINE = 'Denda';

    public static function options(): array
    {
        return collect(self::cases())->map(fn($item) => [
            'value' => $item->value,
            'label' => $item->label,
        ])->values()->toArray();
    }
}
