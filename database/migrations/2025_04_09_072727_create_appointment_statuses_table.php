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
        Schema::create('appointment_statuses', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['pending','completed','scheduled','canceled'])->default('pending');
            $table->timestamps();
        });
        DB::table('appointment_statuses')->insert([
            [
                'status' => 'pending',
            ],
            [
                'status' => 'completed',
            ],
            [
                'status' => 'scheduled',
            ],
            [
                'status' => 'canceled',
            ],
            ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_statuses');
    }
};
