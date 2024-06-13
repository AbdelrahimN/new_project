<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply_member extends Model
{
    use HasFactory;
    protected $table = 'apply_members';
    protected $guarded = [];
    public function apply()
    {
        return $this->belongsTo(Apply::class,'apply_id');
    }
    public function member()
    {
        return $this->belongsTo(Student::class,'member_id');
    }
}
