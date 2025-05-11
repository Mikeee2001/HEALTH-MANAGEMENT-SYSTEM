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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            ['username' => 'user1', 'firstname' => 'User', 'lastname' => 'One', 'email' => 'user1@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'user2', 'firstname' => 'User', 'lastname' => 'Two', 'email' => 'user2@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'user3', 'firstname' => 'User', 'lastname' => 'Three', 'email' => 'user3@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'user4', 'firstname' => 'User', 'lastname' => 'Four', 'email' => 'user4@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'user5', 'firstname' => 'User', 'lastname' => 'Five', 'email' => 'user5@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'user6', 'firstname' => 'User', 'lastname' => 'Six', 'email' => 'user6@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'user7', 'firstname' => 'User', 'lastname' => 'Seven', 'email' => 'user7@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'user8', 'firstname' => 'User', 'lastname' => 'Eight', 'email' => 'user8@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'user9', 'firstname' => 'User', 'lastname' => 'Nine', 'email' => 'user9@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'user10', 'firstname' => 'User', 'lastname' => 'Ten', 'email' => 'user10@gmail.com', 'password' => Hash::make('password')],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
