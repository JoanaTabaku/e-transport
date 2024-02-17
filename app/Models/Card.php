<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'start_date',
        'end_date',
        'status',
        'user_id',
        'subscription_type_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptionType()
    {
        return $this->belongsTo(SubscriptionType::class);
    }

    public static function getStatuses()
    {
        return [
            'active',
            'disabled',
            'expired'
        ];
    }
}
