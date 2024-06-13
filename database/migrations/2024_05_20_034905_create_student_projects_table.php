<?php

use App\Models\Center;
use App\Models\Student_Team;
use App\Models\Supervisor;
use App\Models\Teaching_Assistant;
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
        Schema::create('student_projects', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->foreignIdFor(Center::class,'center_id');
            $table->foreignIdFor(Teaching_Assistant::class,'teaching_assistant_id');
            $table->foreignIdFor(Student_Team::class,'student_team_id');
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_projects');
    }
};
