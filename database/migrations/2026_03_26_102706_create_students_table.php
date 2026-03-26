<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->string('student_id', 20)->primary(); // PK as varchar(20) per your design
        $table->string('last_name', 50);
        $table->string('first_name', 50);
        $table->string('middle_initial', 5);
        $table->string('program', 10); // IT or CS
        $table->integer('year_level'); // 1, 2, 3, or 4
        $table->integer('total_sessions')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
