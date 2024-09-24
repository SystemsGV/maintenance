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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code'); // poner como valor unico
            $table->string('address');
            $table->string('city');
            $table->string('departament');
            $table->string('country');
            $table->string('area_code')->nullable();
            $table->string('priority')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('type')->nullable();
            $table->string('cost')->nullable();
            $table->archivedAt(); // Se genera esta columna para almacenar el estado del archivo si es elimniado(archivado) o restaurado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
