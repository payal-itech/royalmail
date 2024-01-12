<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderIdentifier',
        'firstName',
        'lastName',
        'companyName',
        'addressLine1',
        'addressLine2',
        'addressLine3',
        'county',
        'postcode',
        'countryCode',
        'phoneNumber',
        'emailAddress',

    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
