<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomStudent extends Model
{
    use HasFactory;

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class, 'id_classroom', 'id_classroom');
    }

    public function Student()
    {
        return $this->belongsTo(Student::class, 'id_student', 'id_student');
    }
}
