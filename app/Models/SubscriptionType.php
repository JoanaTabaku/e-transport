<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'duration_in_days',
        'role_id'
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
