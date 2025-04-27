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

        DB::table('appointments')->insert([
            [
                'appointment_name' => 'Consult with Dr. Michael Macas',
                'date_time' => '2025-03-31 10:00:00',
                'appointment_type' => 'consult',
                'user_id' => 1,
                'appointment_status_id' => 1,
                'doctor_id' => 1,
            ],
            [
                'appointment_name' => 'Checkup with Dr. Dongdong Macas',
                'date_time' => '2025-04-01 09:00:00',
                'appointment_type' => 'checkup',
                'user_id' => 2,
                'appointment_status_id' => 2,
                'doctor_id' => 2,
            ],
            [
                'appointment_name' => 'Emergency with Dr. Mike Lafuente',
                'date_time' => '2025-04-02 15:30:00',
                'appointment_type' => 'emergency',
                'user_id' => 3,
                'appointment_status_id' => 1,
                'doctor_id' => 3,
            ],
            [
                'appointment_name' => 'Follow-up with Dr. Michael Macas',
                'date_time' => '2025-04-03 11:15:00',
                'appointment_type' => 'follow-up',
                'user_id' => 4,
                'appointment_status_id' => 1,
                'doctor_id' => 1,
            ],
            [
                'appointment_name' => 'Consult with Dr. Dongdong Macas',
                'date_time' => '2025-04-04 14:00:00',
                'appointment_type' => 'consult',
                'user_id' => 5,
                'appointment_status_id' => 1,
                'doctor_id' => 2,
            ],
            [
                'appointment_name' => 'Checkup with Dr. Mike Lafuente',
                'date_time' => '2025-04-05 08:00:00',
                'appointment_type' => 'checkup',
                'user_id' => 6,
                'appointment_status_id' => 2,
                'doctor_id' => 3,
            ],
            [
                'appointment_name' => 'Emergency with Dr. Michael Macas',
                'date_time' => '2025-04-06 22:00:00',
                'appointment_type' => 'emergency',
                'user_id' => 7,
                'appointment_status_id' => 2,
                'doctor_id' => 1,
            ],
            [
                'appointment_name' => 'Follow-up with Dr. Dongdong Macas',
                'date_time' => '2025-04-07 13:00:00',
                'appointment_type' => 'follow-up',
                'user_id' => 8,
                'appointment_status_id' => 1,
                'doctor_id' => 2,
            ],
            [
                'appointment_name' => 'Consult with Dr. Mike Lafuente',
                'date_time' => '2025-04-08 17:30:00',
                'appointment_type' => 'consult',
                'user_id' => 9,
                'appointment_status_id' => 1,
                'doctor_id' => 3,
            ],
            [
                'appointment_name' => 'Checkup with Dr. Michael Macas',
                'date_time' => '2025-04-09 09:45:00',
                'appointment_type' => 'checkup',
                'user_id' => 10,
                'appointment_status_id' => 2,
                'doctor_id' => 1,
            ],
            [
                'appointment_name' => 'Emergency with Dr. Dongdong Macas',
                'date_time' => '2025-04-10 11:00:00',
                'appointment_type' => 'emergency',
                'user_id' => 11,
                'appointment_status_id' => 1,
                'doctor_id' => 2,
            ],
            [
                'appointment_name' => 'Follow-up with Dr. Mike Lafuente',
                'date_time' => '2025-04-11 15:15:00',
                'appointment_type' => 'follow-up',
                'user_id' => 12,
                'appointment_status_id' => 2,
                'doctor_id' => 3,
            ],
            [
                'appointment_name' => 'Consult with Dr. Michael Macas',
                'date_time' => '2025-04-12 10:30:00',
                'appointment_type' => 'consult',
                'user_id' => 13,
                'appointment_status_id' => 1,
                'doctor_id' => 1,
            ],
            [
                'appointment_name' => 'Checkup with Dr. Dongdong Macas',
                'date_time' => '2025-04-13 16:45:00',
                'appointment_type' => 'checkup',
                'user_id' => 14,
                'appointment_status_id' => 1,
                'doctor_id' => 2,
            ],
            [
                'appointment_name' => 'Emergency with Dr. Mike Lafuente',
                'date_time' => '2025-04-14 21:00:00',
                'appointment_type' => 'emergency',
                'user_id' => 15,
                'appointment_status_id' => 2,
                'doctor_id' => 3,
            ],
            [
                'appointment_name' => 'Follow-up with Dr. Michael Macas',
                'date_time' => '2025-04-15 08:15:00',
                'appointment_type' => 'follow-up',
                'user_id' => 16,
                'appointment_status_id' => 1,
                'doctor_id' => 1,
            ],
            [
                'appointment_name' => 'Consult with Dr. Dongdong Macas',
                'date_time' => '2025-04-16 11:30:00',
                'appointment_type' => 'consult',
                'user_id' => 17,
                'appointment_status_id' => 1,
                'doctor_id' => 2,
            ],
            [
                'appointment_name' => 'Checkup with Dr. Mike Lafuente',
                'date_time' => '2025-04-17 10:00:00',
                'appointment_type' => 'checkup',
                'user_id' => 18,
                'appointment_status_id' => 2,
                'doctor_id' => 3,
            ],
            [
                'appointment_name' => 'Emergency with Dr. Michael Macas',
                'date_time' => '2025-04-18 19:30:00',
                'appointment_type' => 'emergency',
                'user_id' => 19,
                'appointment_status_id' => 1,
                'doctor_id' => 1,
            ],
            [
                'appointment_name' => 'Follow-up with Dr. Dongdong Macas',
                'date_time' => '2025-04-19 12:45:00',
                'appointment_type' => 'follow-up',
                'user_id' => 1,
                'appointment_status_id' => 2,
                'doctor_id' => 2,
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
