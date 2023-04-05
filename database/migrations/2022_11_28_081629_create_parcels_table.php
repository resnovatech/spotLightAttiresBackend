<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('delivery_area')->nullable();
            $table->string('delivery_area_id')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('merchant_invoice_id')->nullable();
            $table->string('cash_collection_amount')->nullable();
            $table->string('parcel_weight')->nullable();
            $table->string('instruction')->nullable();
            $table->string('value')->nullable();
            $table->string('pickup_store_id')->nullable();
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
        Schema::dropIfExists('parcels');
    }
};
