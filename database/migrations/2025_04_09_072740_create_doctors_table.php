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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('specialty');
            $table->string('qualification');
            $table->string('doctor_image')->nullable();
            $table->timestamps();
        });

        DB::table('doctors')->insert([
            [
                'firstname' => 'Michael',
                'lastname' => 'Macas',
                'specialty' => 'Cardiology',
                'qualification' => 'MD',

            ],
            [
                'firstname' => 'Dongdong',
                'lastname' => 'Macas',
                'specialty' => 'Pediatrics',
                'qualification' => 'PhD in Medicine or Medical Science',
            ],
            [
                'firstname' => 'Mike',
                'lastname' => 'Lafuente',
                'specialty' => 'Pediatrics',
                'qualification' => 'PhD in Medicine or Medical Science',
            ],
            ]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
