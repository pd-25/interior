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
        Schema::create('enquries', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('fullName');
            $table->string('email')->nullable();
            $table->string('phoneNo');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable()
            $table->string('page_ref')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquries');
    }
};