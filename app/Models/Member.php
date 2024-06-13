<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $guarded = [];
    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
