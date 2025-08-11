<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Fine;
use App\Models\LoanBook;
use App\Models\ReturnBookCheck;
use App\Models\User;
use App\Enums\ReturnBookStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReturnBook extends Model
{
    protected $fillable = [
        'return_code',
        'loan_id',
        'user_id',
        'book_id',
        'return_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'return_date' => 'date',
            'status' => ReturnBookStatus::class,
        ];
    }

    // Relasi Ke Model User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Ke Model Book
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    // Relasi Ke Model LoanBook
    public function loanBook(): BelongsTo
    {
        return $this->belongsTo(LoanBook::class, 'id');
    }

    // Relasi Ke Model ReturnBookCheck
    public function returnBookCheck(): HasOne
    {
        return $this->hasOne(ReturnBookCheck::class);
    }

    // Relasi Ke Model FineBook
    public function fineBook(): HasOne
    {
        return $this->hasOne(Fine::class, 'return_book_id');
    }
}
