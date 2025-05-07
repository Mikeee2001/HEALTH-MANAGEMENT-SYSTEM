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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_name');
            $table->dateTime('date_time');
            $table->enum('appointment_type', ['checkup', 'emergency', 'follow-up', 'consult']);
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('appointment_status_id');
            $table->unsignedBigInteger('doctor_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('appointment_status_id')->references('id')->on('appointment_statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
        });

        // DB::table('appointments')->insert([
        //     [
        //         'appointment_name' => 'Consult with Dr. Michael Macas',
        //         'date_time' => '2025-03-31 10:00:00',
        //         'appointment_type' => 'consult',
        //         'user_id' => 1,
        //         'appointment_status_id' => 1,
        //         'doctor_id' => 1,
        //     ],
        //     [
        //         'appointment_name' => 'Checkup with Dr. Dongdong Macas',
        //         'date_time' => '2025-04-01 09:00:00',
        //         'appointment_type' => 'checkup',
        //         'user_id' => 2,
        //         'appointment_status_id' => 2,
        //         'doctor_id' => 2,
        //     ],

        //     [
        //         'appointment_name' => 'Follow-up with Dr. Michael Macas',
        //         'date_time' => '2025-04-03 11:15:00',
        //         'appointment_type' => 'follow-up',
        //         'user_id' => 4,
        //         'appointment_status_id' => 1,
        //         'doctor_id' => 1,
        //     ],
        //     [
        //         'appointment_name' => 'Consult with Dr. Dongdong Macas',
        //         'date_time' => '2025-04-04 14:00:00',
        //         'appointment_type' => 'consult',
        //         'user_id' => 5,
        //         'appointment_status_id' => 1,
        //         'doctor_id' => 2,
        //     ],


        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
