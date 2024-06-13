<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    protected $table = 'applies';
    protected $guarded = [];
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class,'supervisor_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function teaching_assistants()
    {
        return $this->belongsTo(Teaching_Assistant::class,'teaching_assistants_id');
    }
    public function apply_members()
    {
        return $this->hasMany(Apply_member::class,'apply_id');
    }
}
