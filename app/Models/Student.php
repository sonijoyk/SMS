<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $guarded = [];

    protected $primaryKey = 'id';
    
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'reporting_teacher', 'id');
    }

    public function studentTerm(){
        return $this->hasMany(StudentTerm::class, 'student_id', 'id');
    }
}
