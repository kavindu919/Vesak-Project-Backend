<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model

{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'user_id');
    }
}
