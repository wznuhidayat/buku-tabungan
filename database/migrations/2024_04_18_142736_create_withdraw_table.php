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
        Schema::create('withdraw', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('user_id');
            $table->decimal('amount',10,2);
            $table->decimal('admin_fee',10,2);
            $table->dateTime('dt_transaction');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraw');
    }
};
