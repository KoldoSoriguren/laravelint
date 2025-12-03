<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('torneos', function (Blueprint $table) {
            $table->boolean('estado')->default(1)->change();
        });
    }

    public function down()
    {
        Schema::table('torneos', function (Blueprint $table) {
            $table->enum('estado', ['1','0'])->default('1')->change();
        });
    }

};
