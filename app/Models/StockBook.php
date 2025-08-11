<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockBook extends Model
{
    protected $fillable = [
        'book_id',
        'total',
        'available',
        'loan',
        'lost',
        'damage',
    ];

    // Relasi Ke Model Book
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
