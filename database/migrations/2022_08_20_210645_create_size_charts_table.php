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
        Schema::create('size_charts', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('size_type')->nullable();
            $table->string('size_name')->nullable();
            $table->string('lenght')->nullable();
            $table->string('shoulder')->nullable();
            $table->string('chest')->nullable();
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
        Schema::dropIfExists('size_charts');
    }
};
