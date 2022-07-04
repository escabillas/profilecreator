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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->string('company');
            $table->string('position');
            $table->boolean('current');
            $table->string('startdatemonth');
            $table->string('startdateyear');
            $table->string('enddatemonth')->nullable();
            $table->string('enddateyear')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->index('profile_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
};
