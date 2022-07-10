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
        Schema::create('category_title', function (Blueprint $table) {
            $table->unsignedInteger('title_id');
            $table->unsignedTinyInteger('category_id');

            $table->primary(['title_id', 'category_id']);
            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('category_title');
    }
};
