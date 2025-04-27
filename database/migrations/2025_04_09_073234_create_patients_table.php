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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('gender');
            $table->date('DOB');
            $table->string('phone', 15);
            $table->text('medical_history');
            $table->timestamps();

            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('doctor_ID');
            $table->unsignedBigInteger('appointments_id');
            $table->unsignedBigInteger('billing_id');


            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor_ID')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('appointments_id')->references('id')->on('appointments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('billing_id')->references('id')->on('billings')->onDelete('cascade')->onUpdate('cascade');


        });
        DB::table('patients')->insert([
            [
                'fullname' => 'John Doe',
                'gender' => 'Male',
                'DOB' => '1990-05-15',
                'phone' => '09171234567',
                'medical_history' => 'History of hypertension, allergic to penicillin',
                'userID' => 1,
                'doctor_ID' => 1,
                'appointments_id' => 1,
                'billing_id' => 1,
            ],
            [
                'fullname' => 'May Doe',
                'gender' => 'Male',
                'DOB' => '1990-05-15',
                'phone' => '09171234567',
                'medical_history' => 'History of hypertension, allergic to penicillin',
                'userID' => 2,
                'doctor_ID' => 1,
                'appointments_id' => 1,
                'billing_id' => 2,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
