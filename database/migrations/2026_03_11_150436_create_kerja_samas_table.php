<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerjaSamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerja_samas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('partner');
            $table->text('description')->nullable();
            $table->enum('status', ['Proses', 'Ditandatangani', 'Selesai'])->default('Proses');
            $table->string('document_url')->nullable();
            $table->date('tanggal')->nullable();
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
        Schema::dropIfExists('kerja_samas');
    }
}
