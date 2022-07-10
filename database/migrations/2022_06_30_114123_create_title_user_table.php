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
        Schema::create('title_user', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('title_id');
            $table->unsignedInteger('user_id');
            $table->unsignedTinyInteger('user_rating')->default(0);
            $table->string('user_channel', 45)->nullable();
            $table->enum('user_status', ['Interessado', 'Acompanhando', 'Aguardando nova temporada',
                'Assistido', 'Pausado', 'Reprisar'])->nullable();
            $table->unsignedTinyInteger('last_season')->nullable();
            $table->unsignedTinyInteger('last_episode')->nullable();
            $table->boolean('user_trash')->default(false);
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
        Schema::dropIfExists('title_user');
    }
};
