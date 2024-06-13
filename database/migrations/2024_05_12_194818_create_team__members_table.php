<?php

use App\Models\Center;
use App\Models\Project;
use App\Models\Supervisor;
use App\Models\Team;
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
        Schema::create('team_members', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->foreignIdFor(Center::class,'center_id');
            $table->foreignIdFor(Supervisor::class,'supervisor_id');
            $table->foreignIdFor(Team::class,'team_id');
            $table->foreignIdFor(Project::class,'project_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team__members');
    }
};
