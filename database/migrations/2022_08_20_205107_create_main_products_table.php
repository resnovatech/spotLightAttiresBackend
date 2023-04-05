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
        Schema::create('main_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('bangla_product_name')->nullable();
            $table->text('video_link')->nullable();
            $table->string('brand')->nullable();
            $table->string('unit')->nullable();
            $table->string('material')->nullable();
            $table->string('alert_quantity')->nullable();
            $table->string('manufacture')->nullable();
            $table->string('manufacture_part_number')->nullable();
            $table->string('condition')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->string('model_number')->nullable();
            $table->string('catalog_number')->nullable();
            $table->string('buying_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('wholesale_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->text('product_detail')->nullable();
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
        Schema::dropIfExists('main_products');
    }
};
