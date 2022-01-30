<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchTagColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watch_tag_colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('watchcolor_id');
            $table->unsignedBigInteger('watch_id');
            $table->foreign('watchcolor_id')->references('id')->on('watchcolors')->onDelete('cascade');
            $table->foreign('watch_id')->references('id')->on('watches')->onDelete('cascade');
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
        Schema::dropIfExists('watch_tag_colors');
    }
}
