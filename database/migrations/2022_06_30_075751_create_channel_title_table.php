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
        Schema::create('channel_title', function (Blueprint $table) {
            $table->unsignedInteger('title_id');
            $table->unsignedTinyInteger('channel_id');
            $table->timestamps();

            $table->primary(['title_id', 'channel_id']);
            $table->foreign('channel_id')->on('channels')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('channel_title');
    }
};
