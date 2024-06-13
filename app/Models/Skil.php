<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skil extends Model
{
    use HasFactory;
    protected $table = 'skils';
    protected $guarded = [];
    public function student_skil()
    {
        return $this->hasMany(StudentSkil::class,'skil_id');
    }
}
