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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('job')->onDelete('cascade');
            $table->text('reqirement')->nullable();
            $table->string('salary_option')->nullable();
            $table->string('salary')->nullable();
            $table->string('location')->nullable();
            $table->enum('type', ['full-time', 'part-time', 'contract', 'freeland', 'internship'])->default('full-time');
            $table->enum('deadline_option',['specific', 'until-full'])->nullable();
            $table->date('deadline')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
