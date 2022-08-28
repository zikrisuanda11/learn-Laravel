<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_course';

    protected $guarded = 'id_course';

    public function Teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher', 'id_teacher');
    }

    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'id_grade', 'id_grade');
    }

    public function ExamResult()
    {
        return $this->hasMany(ExamResult::class);
    }
}
