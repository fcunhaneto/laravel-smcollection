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
        Schema::create('country_title', function (Blueprint $table) {
            $table->unsignedInteger('title_id');
            $table->unsignedTinyInteger('country_id');

            $table->primary(['title_id', 'country_id']);
            $table->foreign('country_id')->on('countries')->references('id')->cascadeOnDelete();
            $table->foreign('title_id')->on('titles')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_title');
    }
};
