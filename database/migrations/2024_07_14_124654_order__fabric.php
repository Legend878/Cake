<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_fabric', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->string('orderID_bank')->nullable(false);
            $table->text('status_order')->nullable(false);
            $table->bigInteger('number_tranzak')->nullable(false);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('order_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_fabric');

    }
};
