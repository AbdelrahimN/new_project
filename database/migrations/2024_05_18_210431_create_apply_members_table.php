<?php

use App\Models\Apply;
use App\Models\Student;
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
        Schema::create('apply_members', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->foreignIdFor(Apply::class,'apply_id');
            $table->foreignIdFor(Student::class,'member_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_members');
    }
};
