<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrdersTable extends Migration
{
public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('orderIdentifier')->nullable();
        $table->string('orderReference')->nullable();
        $table->timestamp('orderStatus')->nullable();
        $table->timestamp('createdOn')->nullable();
        $table->timestamp('printedOn')->nullable();
        $table->timestamp('postageAppliedOn')->nullable();
        $table->timestamp('orderDate')->nullable();
        $table->timestamp('tradingName')->nullable();
        $table->timestamp('channel')->nullable();
        $table->timestamp('marketplaceTypeName')->nullable();
        $table->timestamp('subtotal')->nullable();
        $table->timestamp('shippingCostCharged')->nullable();
        $table->timestamp('orderDiscount')->nullable();
        $table->timestamp('total')->nullable();
        $table->timestamp('weightInGrams')->nullable();
        $table->timestamp('packageSize')->nullable();
        $table->string('accountBatchNumber')->nullable();
        $table->string('currencyCode')->nullable();

        // $table->string('SKU')->nullable();
        // $table->string('name')->nullable();
        // $table->string('quantity')->nullable();
        // $table->string('unitValue')->nullable();
        // $table->string('lineTotal')->nullable();

        $table->timestamps();
    });
}
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}