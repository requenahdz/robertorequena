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
        Schema::create('a002_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');        
            $table->integer('loan_id');
            $table->double('amount', 8, 2);
            $table->double('cuota', 8, 2);
            $table->string('method');
            $table->date('date_at');
            $table->string('status',20);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a002_payments');
    }
};
