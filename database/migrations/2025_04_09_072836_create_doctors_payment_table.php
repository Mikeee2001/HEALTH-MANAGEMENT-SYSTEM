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
        Schema::create('doctors_payment', function (Blueprint $table) {
            $table->id();
            $table->date('payment_date');
            $table->decimal('paid_amount', 10, 2);
            $table->timestamps();

            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('payment_status_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses')->onDelete('cascade')->onUpdate('cascade');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_payment');
    }
};
