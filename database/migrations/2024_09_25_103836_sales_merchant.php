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
        Schema::create('sales_merchant', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_code');
            $table->string('merchant_name');
            $table->string('merchant_address');
            $table->string('merchant_pin');
            $table->string('item_unit_price');
            $table->unsignedBigInteger('created_id');
            $table->unsignedBigInteger('edited_id');
            $table->unsignedBigInteger('deleted_id');
            $table->timestamps();

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
