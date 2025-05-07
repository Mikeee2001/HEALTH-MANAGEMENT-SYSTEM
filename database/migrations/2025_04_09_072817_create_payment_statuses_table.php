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
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['pending', 'completed','failed'])->default('pending');
            $table->timestamps();
        });
        DB::table('payment_statuses')->insert([
            [
                'status' => 'pending',
            ],
            [
                'status' => 'completed',
            ],
            [
                'status' => 'failed',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_statuses');
    }
};
