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
        Schema::table('torneos', function (Blueprint $table) {
            $table->unsignedBigInteger('juego_id')->after('id');
            $table->foreign('juego_id')->references('id')->on('juegos')->onDelete('cascade');
            $table->dropColumn('juego');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('torneos', function (Blueprint $table) {
            $table->string('juego')->after('id');
            $table->dropForeign(['juego_id']);
            $table->dropColumn('juego_id');
        });

    }
};
