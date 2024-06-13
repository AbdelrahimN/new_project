<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $table = 'centers';
    protected $guarded = [];
    public function project()
    {
        return $this->hasMany(Project::class,'center_id');
    }
    public function student()
    {
        return $this->hasMany(Student::class,'center_id');
    }
    public function supervisor()
    {
        return $this->hasMany(Supervisor::class,'center_id');
    }
    public function teaching_assistant()
    {
        return $this->hasMany(Teaching_Assistant::class,'center_id');
    }
    public function team_member()
    {
        return $this->hasMany(Team_Member::class,'center_id');
    }
    public function student_projects()
    {
        return $this->hasMany(StudentProject::class,'center_id');
    }
}
