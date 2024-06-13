<?php

use App\Models\Student;
use App\Models\Student_Team;
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
        Schema::create('studet_tame_tasks', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->foreignIdFor(Student::class,'student_id');
            $table->foreignIdFor(Student_Team::class,'student_tame_id');
            $table->string('title');
            $table->string('percentage_completed');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studet_tame_tasks');
    }
};
