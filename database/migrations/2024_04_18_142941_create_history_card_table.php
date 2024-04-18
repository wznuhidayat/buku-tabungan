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
        Schema::create('history_card', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('user_id');
            $table->foreignId('transactionable_id');
            $table->string('transactionable_type');
            $table->dateTime('dt_transaction');
            $table->decimal('amount',10,2);
            $table->decimal('admin_fee',10,2);
            $table->timestamps();
            $table->index(['transactionable_id', 'transactionable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_card');
    }
};
