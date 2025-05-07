<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->date('billing_date');
            $table->date('issue_date');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('billing_statuses_id');

            $table->foreign('billing_statuses_id')->references('id')->on('payment_statuses')->onDelete('cascade')->onUpdate('cascade');
        });
        DB::table('billings')->insert([
            [
                'billing_date' => '2025-03-01',
                'issue_date' => '2025-03-03',
                'total_amount' => 1500.50,
                'paid_amount' => 500.00,
                'balance' => 1000.50,
                'billing_statuses_id' => 1
            ],
            [
                'billing_date' => '2025-03-05',
                'issue_date' => '2025-03-06',
                'total_amount' => 3000.00,
                'paid_amount' => 3000.00,
                'balance' => 0.00,
                'billing_statuses_id' => 2
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};

