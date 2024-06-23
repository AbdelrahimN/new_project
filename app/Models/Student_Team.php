<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Team extends Model
{
    use HasFactory;
    protected $table = 'student_teams';
    protected $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function student_team_members()
    {
        return $this->hasMany(Student_Team_member::class,'student_team_id');
    }
    public function student_projects()
    {
        return $this->hasMany(StudentProject::class,'student_team_id');
    }
    public function studet_tame_tasks()
    {
        return $this->hasMany(Studet_tame_task::class,'student_tame_id');
    }
    public function team_request()
    {
        return $this->hasMany(TeamRequest::class,'student_team_id');
    }
}

