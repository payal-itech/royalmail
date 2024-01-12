<?php
// database/migrations/{timestamp}_create_order_lines_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLinesTable extends Migration
{
    public function up()
    {
        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained(); // Assuming you have an 'orders' table
            $table->string('SKU');
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('unitValue', 10, 2);
            $table->decimal('lineTotal', 10, 2);
            // Add any additional fields as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_lines');
    }
}

