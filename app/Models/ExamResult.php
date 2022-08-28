<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    public function Exam()
    {
        return $this->belongsTo(Exam::class, 'id_exam', 'id_exam');
    }

    public function Course()
    {
        return $this->belongsTo(Course::class, 'id_course', 'id_course');
    }

    public function Student()
    {
        return $this->belongsTo(Student::class, 'id_student', 'id_student');
    }
}
