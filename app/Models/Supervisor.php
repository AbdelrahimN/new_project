<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supervisor extends Authenticatable
{
    use HasFactory , HasRoles;
    protected $table = 'supervisors';
    protected $guarded = [];
    public function center()
    {
        return $this->belongsTo(Center::class,'center_id');
    }
    public function teaching_assistant()
    {
        return $this->hasMany(Teaching_Assistant::class,'supervisor_id');
    }
    public function team()
    {
        return $this->hasMany(Team::class,'supervisor_id');
    }
    public function project()
    {
        return $this->hasMany(Team::class,'supervisor_id');
    }
    public function team_member()
    {
        return $this->hasMany(Team_Member::class,'supervisor_id');
    }
    public function apply()
    {
        return $this->hasMany(Apply::class,'supervisor_id');
    }
    public function sender()
    {
        return $this->hasMany(ProjectRequest::class,'sender_id');
    }
    public function recipient()
    {
        return $this->hasMany(ProjectRequest::class,'recipient_id');
    }
}
