<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team_Member extends Model
{
    use HasFactory;
    protected $table = 'team_members';
    protected $guarded = [];
    public function center()
    {
        return $this->belongsTo(Center::class,'center_id');
    }
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class,'supervisor_id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

}
