<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->enum('status', ['pendiente', 'resuelto'])->default('pendiente');
            $table->timestamp('resolved_at')->nullable();

            $table->unsignedBigInteger('environment_id')->nullable();
            $table->foreign('environment_id')
            ->references('id')
            ->on('environments')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('computer_id')->nullable();
            $table->foreign('computer_id')
            ->references('id')
            ->on('computers')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('reported_by');
            $table->foreign('reported_by')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};

