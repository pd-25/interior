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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->enum('type', ['home', 'home_renovation', 'new_office', 'office_renovation', 'retail_new_showroom', 'retail_rennovation']);
            $table->string('requirents')->nullable();
            $table->string('services_required')->nullable();
            $table->string('budget')->nullable();
            $table->string('pincode')->nullable();
            $table->string('city')->nullable();
            $table->date('bookingdate')->nullable();
            $table->string('booking_time')->nullable();
            $table->foreignId('partner_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
