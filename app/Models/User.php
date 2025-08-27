<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use App\Enums\UserGender;
use App\Enums\UserStatus;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'firstname',
        'lastname',
        'city_of_birth',
        'date_of_birth',
        'gender',
        'contact',
        'avatar',
        'user_role',
        'user_status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'password' => 'hashed',
            'gender' => UserGender::class,
            'user_role' => UserRole::class,
            'user_status' => UserStatus::class,
        ];
    }

    // Relasi Ke Model LoanBook
    public function loanBooks(): HasMany
    {
        return $this->hasMany(LoanBook::class);
    }

    // Relasi Ke Model ReturnBook
    public function returnBooks(): HasMany
    {
        return $this->hasMany(ReturnBook::class);
    }

    // Relasi Ke Model Fine
    public function fines(): HasMany
    {
        return $this->hasMany(Fine::class, 'user_id');
    }
}
