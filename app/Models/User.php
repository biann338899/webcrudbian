<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Nama tabel.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Primary key dari tabel.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Kolom yang bisa diisi mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',    // kalau pakai email
        // 'username', // kalau tabel kamu pakai username, uncomment ini
        'password',
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting kolom.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
