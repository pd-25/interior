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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('firm_name')->nullable();
            $table->string('partner_id');
            $table->string('firm_pan')->nullable();
            $table->string('firm_gst')->nullable();
            $table->date('firm_start_date');
            $table->string('city')->nullable();
            $table->enum('firm_type', ['Public', 'Private', 'Individual']);
            $table->enum('major_category', ['Interior', 'Painting', 'Electrical Lighting', 'Architectural', 'Plumbing', 'Carpentry & Masonry', 'Flooring', 'Structural']);
            $table->string('project_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
