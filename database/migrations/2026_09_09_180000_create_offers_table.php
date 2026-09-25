<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('level', ['tecnico', 'tecnologo']);
            $table->text('description')->nullable();
            $table->integer('duration_months')->nullable();
            $table->enum('status', ['abierta', 'cerrada'])->default('abierta');

            // Clave foránea hacia el área de formación
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')
            ->references('id')
            ->on('areas')
            ->onDelete('set null')
            ->onUpdate('cascade');
            
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};

