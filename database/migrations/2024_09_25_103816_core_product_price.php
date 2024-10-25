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
        Schema::create('core_product_price', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('product_id');
            $table->string('item_unit_price');
            $table->string('product_price_code')->unique();
            $table->string('product_price_name');
            $table->unsignedBigInteger('created_id');
            $table->unsignedBigInteger('edited_id');
            $table->unsignedBigInteger('deleted_id');
            $table->timestamps();

            $table->foreign('product_category_id')->references('id')->on('core_product_category')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('core_product')->cascadeOnDelete();
            $table->foreign('created_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('edited_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('deleted_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
