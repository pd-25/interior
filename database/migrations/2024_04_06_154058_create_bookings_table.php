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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('service_id');
            $table->string('category', 50);
            $table->string('home_requirements');
            $table->string('renovation');
            $table->string('service');

            $table->integer('number_of_cabins')->nullable();
            $table->integer('number_of_worksations')->nullable();
            $table->float('total_carpet_area')->nullable();

            $table->integer('number_of_cabins_renovation')->nullable();
            $table->integer('number_of_worksations_renovation')->nullable();
            $table->float('total_carpet_area_renovation')->nullable();

            $table->float('total_area')->nullable();
            $table->float('total_area_renovation')->nullable();

            $table->decimal('budget', 18,2);
            $table->integer('pincode')->nullable();
            $table->string('block')->nullable();
            $table->string('city')->nullable();
            $table->timestamp('date');
            $table->time('time');
            $table->integer('expert_id');
            $table->boolean('status')->default(0)->comment('1=Complete, 0=pending');
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
