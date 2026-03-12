<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkkScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekk_scores', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan_name');
            $table->integer('score')->default(0);
            $table->string('grade')->nullable(); // A, B, C
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
        Schema::dropIfExists('ekk_scores');
    }
}
