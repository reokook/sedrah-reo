<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    User::create([
        'name' => 'الحلاق 1',
        'email' => 'barber1@example.com',
        'password' => Hash::make('password'),
        'role' => 'barber',
    ]);
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
