<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studet_tame_task extends Model
{
    use HasFactory;
    protected $table = 'studet_tame_tasks';
    protected $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function team()
    {
        return $this->belongsTo(Student_Team::class,'student_tame_id');
    }
}
