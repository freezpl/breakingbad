<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('quote');
            $table->unsignedBigInteger('character_id');
            $table->unsignedBigInteger('episode_id')->nullable();

            $table->foreign('character_id')->references('id')->on('characters');
            
            $table->foreign('episode_id')
                    ->references('id')
                    ->on('episodes')
                    ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
