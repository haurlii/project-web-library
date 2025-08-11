<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Category;
use App\Models\LoanBook;
use App\Models\Publisher;
use App\Models\StockBook;
use App\Enums\BookStatus;
use App\Enums\BookLanguage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    protected $fillable = [
        'book_code',
        'title',
        'slug',
        'isbn',
        'publication_year',
        'language',
        'synopsis',
        'number_of_pages',
        'status',
        'cover',
        'price',
        'author_id',
        'publisher_id',
        'category_id',
    ];

    protected $with = ['author', 'publisher', 'category'];

    protected function casts(): array
    {
        return [
            'language' => BookLanguage::class,
            'status' => BookStatus::class,
        ];
    }

    // Relasi Ke Model Author
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    // Relasi Ke Model Publisher
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    // Relasi Ke Model Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi Ke Model StockBook
    public function stock(): HasOne
    {
        return $this->hasOne(StockBook::class);
    }

    // Relasi Ke Model LoanBook
    public function loan_books(): HasMany
    {
        return $this->hasMany(LoanBook::class);
    }
}
