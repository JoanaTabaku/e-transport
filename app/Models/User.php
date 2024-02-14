<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'role_id',
        'email',
        'password',
    ];

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
