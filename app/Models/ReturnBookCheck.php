<?php

namespace App\Models;

use App\Models\ReturnBook;
use App\Enums\ReturnBookCondition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReturnBookCheck extends Model
{
    protected $fillable = [
        'return_book_id',
        'condition',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'condition' => ReturnBookCondition::class,
        ];
    }

    // Relasi Ke Model ReturnBook
    public function returnBook(): BelongsTo
    {
        return $this->belongsTo(ReturnBook::class);
    }
}
