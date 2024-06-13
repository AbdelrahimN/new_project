<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Team_member extends Model
{
    use HasFactory;
    protected $table = 'student_team_members';
    protected $guarded = [];
    public function student_team()
    {
        return $this->belongsTo(Student_Team::class,'student_team_id');
    }
    public function member()
    {
        return $this->belongsTo(Student::class,'member_id');
    }
}
