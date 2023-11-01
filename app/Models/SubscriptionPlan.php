<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $table = 'subscription_plans';

    protected $fillable = [
        'name',
        'description',
        'billing_interval',
        'price',
        'status',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
