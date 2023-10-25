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
        Schema::create('a003_tasks', function (Blueprint $table) {
            $table->id(); // Columna de clave primaria autoincremental
            $table->string('code');
            $table->string('name');
            $table->date('date_start');
            $table->string('status');
            $table->text('comments');
            $table->string('priority');
            $table->string('time');
            $table->timestamps(); // Columnas de registro de fecha y hora
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a003_tasks');
    }
};
