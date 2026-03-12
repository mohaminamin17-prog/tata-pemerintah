<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['LPPD (Tahunan)', 'LKPJ (Akhir Tahun)', 'Laporan Triwulan'])->default('LPPD (Tahunan)');
            $table->integer('year');
            $table->string('document_url')->nullable();
            $table->date('deadline')->nullable();
            $table->decimal('evaluation_score', 5, 2)->nullable();
            $table->enum('status', ['Terupload', 'Dalam Review', 'Revisi', 'Selesai'])->default('Terupload');
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
        Schema::dropIfExists('laporans');
    }
}
