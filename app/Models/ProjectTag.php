<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    use HasFactory;
    protected $table = 'project_tags';
    protected $guarded = [];
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
    public function skil()
    {
        return $this->belongsTo(Skil::class,'skil_id');
    }
}
