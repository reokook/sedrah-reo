<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // المستخدم الذي قام بالحجز
        $table->foreignId('barber_id')->constrained('users')->onDelete('cascade'); // الحلاق
        $table->dateTime('booking_date'); // تاريخ ووقت الحجز
        $table->string('status')->default('pending'); // حالة الحجز (معلّق، مؤكد، مكتمل)
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
