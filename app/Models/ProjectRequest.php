<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    use HasFactory;
    protected $table = 'project_requests';
    protected $guarded = [];
    public function sender()
    {
        return $this->belongsTo(Supervisor::class,'sender_id');
    }
    public function recipient()
    {
        return $this->belongsTo(Supervisor::class,'recipient_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
