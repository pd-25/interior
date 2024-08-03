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
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('title_one')->nullable();
            $table->text('title_one_description')->nullable();
            $table->string('title_two')->nullable();
            $table->text('title_two_description')->nullable();
            $table->string('title_three')->nullable();
            $table->text('title_three_description')->nullable();
            $table->string('title_one_faq')->nullable();
            $table->text('faq_item_one_description')->nullable();
            $table->string('title_two_faq')->nullable();
            $table->text('faq_item_two_description')->nullable();
            $table->string('title_three_faq')->nullable();
            $table->text('faq_item_three_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutuses');
    }
};
