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
        Schema::create('order_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('cake_id')->nullable(false);
            $table->string('size')->nullable(false);
            $table->string('nachinka_id',100)->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->unsignedBigInteger('time_id')->nullable(false);
            $table->unsignedBigInteger('delivery')->nullable(false);
            $table->text('comment', 200)->nullable();
            $table->string('file_user')->nullable();
            $table->date('date')->nullable(false);
          
            $table->timestamps();



            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('cake_id')->references('id')->on('products');
            $table->foreign('time_id')->references('id')->on('times');
            $table->foreign('delivery')->references('id')->on('deliveries');
            // $table->foreign('status_order')->references('id')->on('statuses');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_users');
    }
};
