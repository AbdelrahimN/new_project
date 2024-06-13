<?php

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
        Schema::table('applies', function (Blueprint $table) {
            $table->foreignIdFor(Teaching_Assistant::class,'teaching_assistants_id')->after('supervisor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applies', function (Blueprint $table) {
            //
        });
    }
};
