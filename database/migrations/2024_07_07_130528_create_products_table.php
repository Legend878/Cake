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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_cake', 50)->nullable(false);
            $table->string('image')->nullable(false);
            $table->decimal('price', 10, 2)->nullable(false);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('tags_one_id')->nullable(false);

            $table->unsignedBigInteger('tags_two_id')->nullable(null);

            $table->foreign('tags_one_id')->references('id')->on('tags');
            $table->foreign('tags_two_id')->references('id')->on('tags');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
