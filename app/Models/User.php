<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'idUser',
        'name', 
        'username', 
        'password',  
        'email',
        'telepon',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function examAttempts(): HasMany
    {
        return $this->hasMany(ExamAttempt::class);
    }

    // protected function role(): Attribute {
    //     return new Attribute(
    //         get: fn($value) => ["user", "admin"][$value],
    //     );
    // }
}