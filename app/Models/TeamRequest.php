<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamRequest extends Model
{
    use HasFactory;
    protected $table = 'team_requests';
    protected $guarded = [];
    public function student_team()
    {
        return $this->belongsTo(Student_Team::class,'student_team_id');
    }
    public function teaching()
    {
        return $this->belongsTo(Teaching_Assistant::class,'teaching_id');
    }
}
