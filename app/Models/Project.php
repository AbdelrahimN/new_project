<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
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
    public function proposals()
    {
        return $this->hasMany(Proposal::class,'project_id');
    }
    public function team_member()
    {
        return $this->hasMany(Team_Member::class,'project_id');
    }
    public function request()
    {
        return $this->hasMany(ProjectRequest::class,'project_id');
    }
    public function tag()
    {
        return $this->hasMany(ProjectTag::class,'project_id');
    }
}
