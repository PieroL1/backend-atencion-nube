<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    // Si no usas incrementing uuid como PK, déjalo así:
    public $incrementing = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'dni',
        'document',
        'email',
        'phone_number',
        'address',
        'birth_date',
        'role',
        'password',
        'gender',
        'country',
        'country_location',
        'profile_photo',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'array',
    ];
}
