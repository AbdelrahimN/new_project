<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';
    protected $guarded = [];
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class,'supervisor_id');
    }
    
    public function team_member()
    {
        return $this->hasMany(Team_Member::class,'team_id');
    }
    public function members()
    {
        return $this->hasMany(Member::class,'project_id');
    }
}
