<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $table = 'student_term_marks';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function studentTerm()
    {
        return $this->belongsTo(StudentTerm::class, 'student_terms_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

}
