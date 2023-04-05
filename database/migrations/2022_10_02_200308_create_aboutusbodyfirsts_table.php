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
        Schema::create('aboutusbodyfirsts', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('main_title')->nullable();
            $table->string('title_one')->nullable();
            $table->text('title_one_des')->nullable();
            $table->string('title_two')->nullable();
            $table->text('title_two_des')->nullable();
            $table->string('title_three')->nullable();
            $table->text('title_three_des')->nullable();
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
        Schema::dropIfExists('aboutusbodyfirsts');
    }
};
