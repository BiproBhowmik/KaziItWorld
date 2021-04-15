<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_teams', function (Blueprint $table) {
            $table->increments('tmId');
            $table->string('tmPho');
            $table->string('tmName');
            $table->string('tmPosition');
            $table->string('tmValue');
            $table->string('tmTwLink')->default("#");
            $table->string('tmFbLink')->default("#");
            $table->string('tmInLink')->default("#");
            $table->string('tmLnLink')->default("#");
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
        Schema::dropIfExists('our_teams');
    }
}
