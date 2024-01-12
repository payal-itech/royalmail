<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'orderIdentifier',
        'orderReference',
        'orderStatus',
        'createdOn',
        'printedOn',
        'postageAppliedOn',
        'orderDate',
        'tradingName',
        'channel',
        'marketplaceTypeName',
        'subtotal',
        'shippingCostCharged',
        'orderDiscount',
        'total',
        'weightInGrams',
        'packageSize',
        'accountBatchNumber',
        'currencyCode',
        'trackingNumber',
        // 'orderLines',[
        // 'SKU',
        // 'name',
        // 'quantity',
        // 'unitValue',
        // 'lineTotal',
        // ]
    ];
    public function shippingDetail()
    {
        return $this->hasOne(ShippingDetail::class);
    }
    public function shippingInfo()
    {
        return $this->hasOne(ShippingInfo::class);
    }

    public function billingInfo()
    {
        return $this->hasOne(BillingInfo::class);
    }
}
