<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSkil extends Model
{
    use HasFactory;
    protected $table = 'student_skils';
    protected $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function skil()
    {
        return $this->belongsTo(Skil::class,'skil_id');
    }
}
