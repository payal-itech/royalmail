<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderIdentifier',
        'shipping_cost',
        'tracking_number',
        'service_code',
        'receive_email_notification',
        'receive_sms_notification',
        'request_signature_upon_delivery',
        'is_local_collect',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
