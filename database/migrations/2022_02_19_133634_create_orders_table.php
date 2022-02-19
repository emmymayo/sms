<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('transaction_id')->nullable();
            $table->foreignId('product_id')->constrained()->onDelete('no action');
            $table->foreignId('user_id')->constrained()->onDelete('no action');
            $table->string('on_behalf')->nullable();
            $table->tinyInteger('quantity')->default(1);
            $table->decimal('sub_total', 10, 2);
            $table->tinyInteger('payment_method');
            $table->tinyInteger('payment_status');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
