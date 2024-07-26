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
        Schema::create('tb_estrategia_wms', function (Blueprint $table) {
            $table->id('cd_estrategia_wms');
            $table->string('ds_estrategia_wms');
            $table->integer('nr_prioridade');
            $table->timestamp('dt_registro')->nullable();
            $table->timestamp('dt_modificado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_estrategia_wms');
    }
};
