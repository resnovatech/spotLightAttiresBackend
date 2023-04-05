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
        Schema::create('extra_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size')->nullable();
            $table->string('length')->nullable();
            $table->string('shoulder')->nullable();
            $table->string('chest')->nullable();
            $table->string('random_number')->nullable();
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
        Schema::dropIfExists('extra_sizes');
    }
};
