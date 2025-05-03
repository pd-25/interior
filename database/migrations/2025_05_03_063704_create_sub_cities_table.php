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
        Schema::create('sub_cities', function (Blueprint $table) {
            $table->id();
            $table->string('sub_city_name');
            $table->foreignId('partent_service_city_id')->constrained('partent_service_cities')->onDelete('cascade');
            $table->boolean('sub_city_status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_cities');
    }
};
