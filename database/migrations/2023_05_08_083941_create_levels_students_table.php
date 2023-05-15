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
        Schema::create('levels_students', function (Blueprint $table) {
            $table->id();
            $table->year('school_year');
            $table->unsignedBiginteger('level_id')->unsigned();
            $table->unsignedBiginteger('student_id')->unsigned();
            $table->foreign('level_id')->references('id')
                 ->on('levels')->onDelete('cascade');
            $table->foreign('student_id')->references('id')
                ->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels_students');
    }
};
