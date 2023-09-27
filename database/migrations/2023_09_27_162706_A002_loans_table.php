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
        Schema::create('a002_loans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->double('amount', 8, 2);
            $table->double('tasa', 8, 2);
            $table->string('plazo');
            $table->integer('cuotas');
            $table->double('total',8,2);
            $table->double('interest',8,2);
            $table->string('status',20);
            $table->date('date_start');
            $table->date('date_end');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a002_loans');
    }
};
