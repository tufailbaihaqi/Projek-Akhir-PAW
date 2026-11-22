<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('customer_name');
            $table->string('customer_phone', 20);
            $table->date('booking_date');
            $table->string('time_slot', 20); // contoh: "10:00", "13:00"
            $table->integer('total_price');
            $table->string('payment_status', 30)->default('unpaid'); // unpaid, paid, refunded
            $table->string('status', 30)->default('pending'); // pending, confirmed, completed, canceled
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
