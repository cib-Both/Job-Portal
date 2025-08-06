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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_contact_phone')->nullable();
            $table->string('resume')->nullable();
            $table->enum('status', ['applied', 'interviewed', 'offered', 'rejected'])->default('applied');
            $table->datetime('applied_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
