<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

//https://laravel.com/docs/10.x/eloquent#generating-model-classes
class User extends Authenticatable
{
    use HasUuids, HasApiTokens, HasFactory, Notifiable;

	public function newUniqueId(): string
	{
		return (string) Uuid::uuid4();
	}

	public function uniqueIds(): array
	{
		return ['username'];
	}

	/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
		'username',
        'name',
        'email',
        'password',
		'google_id',
		'steam_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
