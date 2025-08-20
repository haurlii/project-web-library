<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use App\Models\ReturnBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanBook extends Model
{
    protected $fillable = [
        'loan_code',
        'user_id',
        'book_id',
        'loan_date',
        'due_date',
    ];

    protected function casts(): array
    {
        return [
            'loan_date' => 'date',
            'due_date' => 'date',
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

    // Relasi Ke Model ReturnBook
    public function returnBook(): HasOne
    {
        return $this->hasOne(ReturnBook::class, 'loan_id', 'id');
    }
}
