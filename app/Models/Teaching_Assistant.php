<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Teaching_Assistant extends Authenticatable
{
    use HasFactory , HasRoles;
    protected $table = 'teaching__assistants';
    protected $guarded = [];
    public function center()
    {
        return $this->belongsTo(Center::class,'center_id');
    }
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class,'supervisor_id');
    }
    public function Student_Team()
    {
        return $this->hasMany(Student_Team::class,'teaching_assistant_id');
    }
    public function apply()
    {
        return $this->hasMany(Apply::class,'teaching_assistants_id');
    }
    public function student_projects()
    {
        return $this->hasMany(StudentProject::class,'teaching_assistant_id');
    }
}
