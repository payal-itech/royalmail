<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderIdentifier')->constrained(); // Assuming there is an orders table
            $table->decimal('shipping_cost', 8, 2)->default(0.0);
            $table->string('tracking_number');
            $table->string('service_code');
            $table->boolean('receive_email_notification')->default(false);
            $table->boolean('receive_sms_notification')->default(false);
            $table->boolean('request_signature_upon_delivery')->default(false);
            $table->boolean('is_local_collect')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipping_details');
    }
}

