<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTerm extends Model
{
    use HasFactory;

    protected $table = 'student_terms';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id', 'id');
    }

    public function studentTermMarks(){
        return $this->hasMany(StudentMark::class, 'student_terms_id', 'id');
    }



}
