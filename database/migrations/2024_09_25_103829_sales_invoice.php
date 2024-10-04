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
        Schema::create('sales_invoice', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_id');
            $table->string('product_category_id');
            $table->string('product_id');
            $table->string('product_price_id');
            $table->string('item_unit_price');
            $table->string('total_amount');
            $table->timestamp('sales_invoice_date');
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
