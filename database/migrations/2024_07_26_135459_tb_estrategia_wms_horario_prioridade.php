<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_estrategia_wms_horario_prioridade', function (Blueprint $table) {
            $table->id('cd_estrategia_wms_horario_prioridade');
            $table->unsignedBigInteger('cd_estrategia_wms');
            $table->string('ds_horario_inicio', 5);
            $table->string('ds_horario_final', 5);
            $table->integer('nr_prioridade');
            $table->timestamp('dt_registro')->nullable();
            $table->timestamp('dt_modificado')->nullable();
            $table->foreign('cd_estrategia_wms')
                ->references('cd_estrategia_wms')
                ->on('tb_estrategia_wms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_estrategia_wms_horario_prioridade');
    }
};
