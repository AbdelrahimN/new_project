<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends Authenticatable
{
    use HasFactory;
    protected $table = 'students';
    protected $guarded = [];
    public function center()
    {
        return $this->belongsTo(Center::class,'center_id');
    }
    public function apply()
    {
        return $this->hasMany(Apply::class,'student_id');
    }
    public function team()
    {
        return $this->hasMany(Student::class,'student_id');
    }
    public function student_team_members()
    {
        return $this->hasMany(Student_Team_member::class,'member_id');
    }
    public function apply_members()
    {
        return $this->hasMany(Apply_member::class,'member_id');
    }
    public function members()
    {
        return $this->hasMany(Member::class,'student_id');
    }
    public function document()
    {
        return $this->hasMany(StudentDocument::class,'student_id');
    }
    public function studet_tame_tasks()
    {
        return $this->hasMany(Studet_tame_task::class,'student_id');
    }
    public function student_skil()
    {
        return $this->hasMany(StudentSkil::class,'student_id');
    }
    public function team_member()
    {
        return $this->hasMany(Team_Member::class,'student_id');
    }
}
