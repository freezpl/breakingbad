<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodeCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_character', function (Blueprint $table) {
            $table->unsignedBigInteger('episode_id');
            $table->foreign('episode_id')->references('id')
                  ->on('episodes')->onDelete('cascade');
      
            $table->unsignedBigInteger('character_id');
            $table->foreign('character_id')->references('id')
                  ->on('characters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episode_character');
    }
}
