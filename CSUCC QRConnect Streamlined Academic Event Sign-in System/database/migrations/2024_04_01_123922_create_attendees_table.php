<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('fname');
            $table->string('lname');
            $table->string('birth_date');
            $table->string('email')->unique();
            $table->string('occupational_status');
            $table->string('school_name')->nullable();
            $table->string('employer')->nullable();
            $table->string('work_specialization')->nullable();
            $table->string('valid_id');
            $table->string('unique_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendees');
    }
};
