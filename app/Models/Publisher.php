<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publisher extends Model
{
    /** @use HasFactory<\Database\Factories\PublisherFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'address',
        'email',
        'contact',
        'logo',
    ];

    public function books(): HasMany
    {
        return $this->hashMany(Book::class);
    }
}
