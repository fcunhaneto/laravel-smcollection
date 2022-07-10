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
        Schema::create('titles', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('title')->fulltext();
            $table->string('original_title')->nullable();
            $table->year('year');
            $table->unsignedTinyInteger('series_seasons')->nullable();
            $table->enum('series_situation', ['Renovada', 'Finalizada', 'Cancelada'])->nullable();
            $table->time('movie_duration')->nullable();
            $table->string('title_categories')->nullable();
            $table->string('title_channels')->nullable();
            $table->string('title_countries')->nullable();
            $table->boolean('is_movie')->default(false);
            $table->string('poster')->default('fake-poster.png');
            $table->text('summary')->nullable();
            $table->timestamps();

            $table->unique(['title', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titles');
    }
};
