<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function notificationsSent()
    {
        return $this->hasMany(Notification::class, 'from_user_id');
    }

    public function notificationsReceived()
    {
        return $this->hasMany(Notification::class, 'to_user_id');
    }
}
