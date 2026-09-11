<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // FK hacia la oferta (programa) a la que pertenece esta ficha
            $table->unsignedBigInteger('offer_id')->nullable()->after('environment_id');
            $table->foreign('offer_id')
            ->references('id')
            ->on('offers')
            ->onDelete('set null')
            ->onUpdate('cascade');

            // Cupo máximo de aprendices para esta ficha
            $table->integer('quota')->nullable()->after('offer_id');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['offer_id']);
            $table->dropColumn(['offer_id', 'quota']);
        });
    }
};

