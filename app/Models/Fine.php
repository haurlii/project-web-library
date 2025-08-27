<?php

namespace App\Models;

use App\Models\ReturnBook;
use App\Enums\FinePaymentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fine extends Model
{
    protected $fillable = [
        'return_book_id',
        'user_id',
        'late_fee',
        'other_fee',
        'total_fee',
        'payment_status',
        'fine_date',
    ];

    protected function casts(): array
    {
        return [
            'paymen_status' => FinePaymentStatus::class,
            'fine_date' => 'date',
        ];
    }

    // Relasi Ke Model User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Ke Model ReturnBook
    public function returnBook(): BelongsTo
    {
        return $this->belongsTo(ReturnBook::class, 'id');
    }
}
