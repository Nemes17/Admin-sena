<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('status', ['presente', 'ausente', 'tarde']);
            $table->string('observations')->nullable();
            
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('apprentice_id');
            $table->foreign('apprentice_id')
            ->references('id')
            ->on('apprentices')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();

            // Un aprendiz solo puede tener un registro de asistencia por curso y por día
            $table->unique(['course_id', 'apprentice_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};

