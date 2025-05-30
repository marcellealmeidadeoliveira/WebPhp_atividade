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
        Schema::create('nome_analogs', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nomeCriador');
            $table->string('idioma');
            $table->string('tipo');
            $table->text('sinopsia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nome_analogs');
    }
};
