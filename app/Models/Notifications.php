<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'type', 'data', 'type', 'notifiable', 'user_id', 'read_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
