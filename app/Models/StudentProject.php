<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProject extends Model
{
    use HasFactory;
    protected $table = 'student_projects';
    protected $guarded = [];
    public function center()
    {
        return $this->belongsTo(Center::class,'center_id');
    }
    public function student_team()
    {
        return $this->belongsTo(Student_Team::class,'student_team_id');
    }
    public function teaching_assistant()
    {
        return $this->belongsTo(Teaching_Assistant::class,'teaching_assistant_id');
    }
}
