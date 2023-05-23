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
        Schema::disableForeignKeyConstraints();
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervisor_id')->constrained('supervisors');
            $table->foreignId('student_id')->constrained('students');
            $table->date('start');
            $table->date('end');
            $table->json('grades')->nullable();
            $table->binary('project')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
