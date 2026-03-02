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
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('nss')->nullable();
        $table->string('afiliacion')->nullable();
        $table->string('consultorio')->nullable();
        $table->string('turno')->nullable();
        $table->text('diagnostico')->nullable();
        $table->date('fecha_inicio');
        $table->date('fecha_fin');
        $table->enum('estatus', ['Activo','Vencido'])->default('Activo');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
