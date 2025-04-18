<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'name',
        'district',
        'province',
        'venue',
        'description',
        'start_at',
        'end_at'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
